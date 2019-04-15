<?php

namespace App\Http\Controllers\ModelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Product\ProductInventory;
use App\Models\Product\ProductDetail;
use App\Models\Product\Car;
use App\Models\Other\Image;
use App\Models\Other\MoreImage;

class CarController extends Controller
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
            'car_name' => 'required|string|max:100',
            'car_stock' => 'required|integer',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'car_model' => 'required|integer',
        ]);

        $car = new Car();
        $car->name = $request->Input('car_name');
        $car->buying_price = $request->Input('buying_price');
        $car->selling_price = $request->Input('selling_price');

        if($request->has('discount')){
          $car->current_discount = $request->Input('discount')/100;
        }

        if($request->has('max_discount')){
          $car->max_possible_discount = $request->Input('max_discount')/100;
        }
        $car->model_id = $request->Input('car_model');

        if($request->has(['car_image_main'])){
          $carimage = (new ImageController)->storeOnlyImage($request, 'car_image_main', 'images/products/car/');
          $car->image_id = $carimage->id;
        }

        $car->save();

        $stock = new ProductInventory();
        $stock->product_type = 'car';
        $stock->product_id = $car->id;
        $stock->quantity = $request->Input('car_stock');
        $stock->showroom_id = Auth::guard('showroomstaff')->user()->getShowRoom()->id;
        $stock->save();

        for ($i=1; $i < 4; $i++) {
            if($request->has(['car_image_extra'.$i])){
                $extraImg = (new ImageController)->storeOnlyImage($request, 'car_image_extra'.$i, 'images/products/car/');
                $extra = new MoreImage();
                $extra->product_type = 'car';
                $extra->product_id = $car->id;
                $extra->image_id = $extraImg->id;
                $extra->save();
            }
        }

        for ($i=1; $i < 50; $i++) {
            if($request->has(['car_detail_criteria'.$i]) && ($request->Input('car_detail_criteria'.$i) != null && $request->Input('car_detail'.$i) != null)){
                $detail = new ProductDetail();
                $detail->product_type = 'car';
                $detail->product_id = $car->id;
                $detail->detail_criteria = $request->Input('car_detail_criteria'.$i);
                $detail->detail = $request->Input('car_detail'.$i);
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
        return 123;
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
            'car_name' => 'required|string|max:100',
            'car_stock' => 'required|integer',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'car_model' => 'required|integer',
        ]);

        $car = Car::find($id);
        $car->name = $request->Input('car_name');
        $car->buying_price = $request->Input('buying_price');
        $car->selling_price = $request->Input('selling_price');

        if($request->has('discount')){
          $car->current_discount = $request->Input('discount')/100;
        }

        if($request->has('max_discount')){
          $car->max_possible_discount = $request->Input('max_discount')/100;
        }
        $car->model_id = $request->Input('car_model');

        if($request->has(['car_image_main'])){
          $carimage = (new ImageController)->storeOnlyImage($request, 'car_image_main', 'images/products/car/');
          $car->image_id = $carimage->id;
        }

        $car->save();

        $stock = ProductInventory::where('product_type', 'car')->where('product_id', $car->id)->where('showroom_id', Auth::guard('showroomstaff')->user()->getShowRoom()->id)->first();
        $stock->quantity = $request->Input('car_stock');
        $stock->save();

        $prevExtra = $car->getExtraImage();

        for ($i=1; $i < 4; $i++) {
            if($request->has(['car_image_extra'.$i])){
                if(count($prevExtra) > $i-1){
                  $prevExtra[$i-1]->delete();
                }
                $extraImg = (new ImageController)->storeOnlyImage($request, 'car_image_extra'.$i, 'images/products/car/');
                $extra = new MoreImage();
                $extra->product_type = 'car';
                $extra->product_id = $car->id;
                $extra->image_id = $extraImg->id;
                $extra->save();
            }
        }

        $details = ProductDetail::where('product_type', 'car')->where('product_id', $car->id)->get();

        foreach ($details as $detail) {
            $detail->delete();
        }

        for ($i=1; $i < 50; $i++) {
            if($request->has(['car_detail_criteria'.$i]) && ($request->Input('car_detail_criteria'.$i) != null && $request->Input('car_detail'.$i) != null)){
                $detail = new ProductDetail();
                $detail->product_type = 'car';
                $detail->product_id = $car->id;
                $detail->detail_criteria = $request->Input('car_detail_criteria'.$i);
                $detail->detail = $request->Input('car_detail'.$i);
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
        $car = Car::find($id);
        $car->delete();

        return redirect()->route('showroom.show.inventory');
    }
}
