<?php

namespace App\Http\Controllers\ModelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product\CarModel;

class CarModelController extends Controller
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
            'model_name' => 'required|string|max:100',
            'model_detail' => 'required|string|max:500',
            'from' => 'required',
            'to' => 'required',
            'car_maker' => 'required',
        ]);

        $carModel = new CarModel();
        if($request->has(['car_modal_image'])){
          $image = (new ImageController)->storeOnlyImage($request, 'car_modal_image', 'images/categories/car model/');
          $carModel->image_id = $image->id;
        }
        $carModel->name = $request->Input('model_name');
        $carModel->details = $request->Input('model_detail');
        $carModel->Year_from_to = $request->Input('from').' - '.$request->Input('to');
        $carModel->maker_id = $request->Input('car_maker');
        $carModel->save();

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
        //
    }
}
