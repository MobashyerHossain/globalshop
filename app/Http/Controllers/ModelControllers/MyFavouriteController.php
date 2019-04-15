<?php

namespace App\Http\Controllers\ModelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Other\MyFavourite;

class MyFavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('consumer.profile')->with('show_favourites', 'show my favourites');
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
        $favourite = new MyFavourite();
        $favourite->product_type = $request->Input('product_type');
        $favourite->product_id = $request->Input('product_id');
        $favourite->consumer_id = Auth::id();
        $favourite->save();

        if($request->Input('product_type') == 'part'){
            return redirect()->route('find.part.details', ['partId' => $request->Input('product_id')]);
        }
        else{
            return redirect()->route('find.car.details', ['carId' => $request->Input('product_id')]);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favourite = MyFavourite::find($id);
        $productId = $favourite->product_id;
        $productType = $favourite->product_type;
        $favourite->delete();

        if($productType == 'part'){
            return redirect()->route('find.part.details', ['partId' => $productId]);
        }
        else{
            return redirect()->route('find.car.details', ['carId' => $productId]);
        }
    }

    public function destroyFromProfile($id)
    {
        $favourite = MyFavourite::find($id);
        $productId = $favourite->product_id;
        $productType = $favourite->product_type;
        $favourite->delete();

        return redirect()->route('consumer.profile');
    }
}
