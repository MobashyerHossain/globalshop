<?php

namespace App\Http\Controllers\ModelControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Product\PartSubCategory;

class PartSubCategoryController extends Controller
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
            'sub_category_name' => 'required|string|max:100',
            'sub_category_detail' => 'required|string|max:500',
            'part_category' => 'required',
        ]);

        $partSubCategory = new PartSubCategory();
        if($request->has(['part_subcategory_image'])){
          $image = (new ImageController)->storeOnlyImage($request, 'part_subcategory_image', 'images/categories/part sub category/');
          $partSubCategory->image_id = $image->id;
        }
        $partSubCategory->name = $request->Input('sub_category_name');
        $partSubCategory->details = $request->Input('sub_category_detail');
        $partSubCategory->category_id = $request->Input('part_category');
        $partSubCategory->save();

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
