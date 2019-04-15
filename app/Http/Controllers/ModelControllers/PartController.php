<?php

namespace App\Http\Controllers\ModelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Product\ProductInventory;
use App\Models\Product\ProductDetail;
use App\Models\Product\Part;
use App\Models\Other\MoreImage;


class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'part_name' => 'required|string|max:100',
            'part_stock' => 'required|integer',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'part_sub_category' => 'required|integer',
            'part_manufacturer' => 'required|integer',
        ]);

        $part = new Part();
        $part->name = $request->Input('part_name');
        $part->buying_price = $request->Input('buying_price');
        $part->selling_price = $request->Input('selling_price');

        if($request->has('discount')){
            $part->current_discount = $request->Input('discount')/100;
        }

        if($request->has('max_discount')){
            $part->max_possible_discount = $request->Input('max_discount')/100;
        }
        $part->sub_category_id = $request->Input('part_sub_category');
        $part->manufacturer_id = $request->Input('part_manufacturer');

        if($request->has(['part_image_main'])){
            $partimage = (new ImageController)->storeOnlyImage($request, 'part_image_main', 'images/products/part/');
            $part->image_id = $partimage->id;
        }

        $part->save();

        $stock = new ProductInventory();
        $stock->product_type = 'part';
        $stock->product_id = $part->id;
        $stock->quantity = $request->Input('part_stock');
        $stock->showroom_id = Auth::guard('showroomstaff')->user()->getShowRoom()->id;
        $stock->save();

        for ($i=1; $i < 4; $i++) {
            if($request->has(['part_image_extra'.$i])){
                $extraImg = (new ImageController)->storeOnlyImage($request, 'part_image_extra'.$i, 'images/products/part/');
                $extra = new MoreImage();
                $extra->product_type = 'part';
                $extra->product_id = $part->id;
                $extra->image_id = $extraImg->id;
                $extra->save();
            }
        }

        for ($i=1; $i < 50; $i++) {
            if($request->has(['part_detail_criteria'.$i]) && ($request->Input('part_detail_criteria'.$i) != null && $request->Input('part_detail'.$i) != null)){
                $detail = new ProductDetail();
                $detail->product_type = 'part';
                $detail->product_id = $part->id;
                $detail->detail_criteria = $request->Input('part_detail_criteria'.$i);
                $detail->detail = $request->Input('part_detail'.$i);
                $detail->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'part_name' => 'required|string|max:100',
            'part_stock' => 'required|integer',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'part_sub_category' => 'required|integer',
            'part_manufacturer' => 'required|integer',
        ]);
        $part = Part::find($id);
        $part->name = $request->Input('part_name');
        $part->buying_price = $request->Input('buying_price');
        $part->selling_price = $request->Input('selling_price');

        if($request->has('discount')){
            $part->current_discount = $request->Input('discount')/100;
        }

        if($request->has('max_discount')){
            $part->max_possible_discount = $request->Input('max_discount')/100;
        }
        $part->sub_category_id = $request->Input('part_sub_category');
        $part->manufacturer_id = $request->Input('part_manufacturer');

        if($request->has(['part_image_main'])){
            $partimage = (new ImageController)->storeOnlyImage($request, 'part_image_main', 'images/products/part/');
            $part->image_id = $partimage->id;
        }

        $part->save();

        $stock = ProductInventory::where('product_type', 'part')->where('product_id', $part->id)->where('showroom_id', Auth::guard('showroomstaff')->user()->getShowRoom()->id)->first();
        $stock->quantity = $request->Input('part_stock');
        $stock->save();

        $prevExtra = $part->getExtraImage();

        for ($i=1; $i < 4; $i++) {
            if($request->has(['part_image_extra'.$i])){
                if(count($prevExtra) > $i-1){
                  $prevExtra[$i-1]->delete();
                }
                $extraImg = (new ImageController)->storeOnlyImage($request, 'part_image_extra'.$i, 'images/products/part/');
                $extra = new MoreImage();
                $extra->product_type = 'part';
                $extra->product_id = $part->id;
                $extra->image_id = $extraImg->id;
                $extra->save();
            }
        }

        $details = ProductDetail::where('product_type', 'part')->where('product_id', $part->id)->get();

        foreach ($details as $detail) {
            $detail->delete();
        }

        for ($i=1; $i < 50; $i++) {
            if($request->has(['part_detail_criteria'.$i]) && ($request->Input('part_detail_criteria'.$i) != null && $request->Input('part_detail'.$i) != null)){
                $detail = new ProductDetail();
                $detail->product_type = 'part';
                $detail->product_id = $part->id;
                $detail->detail_criteria = $request->Input('part_detail_criteria'.$i);
                $detail->detail = $request->Input('part_detail'.$i);
                $detail->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = Part::find($id);
        $part->delete();

        return redirect()->route('showroom.show.inventory');
    }
}
