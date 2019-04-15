<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Other\Image;

class Image extends Model
{
    protected $fillable = [
        'uri', 'image_type',
    ];

    public function getDefaultProfilePic(){
      return 1;
    }

    public function getCarMakerLogoStartPointId(){
        $logo = Image::where('image_type', 'car_maker_logo')->first();
        if($logo){
          return $logo->id;
        }
        else{
          return 4;
        }
    }

    public function getExtraCarImageStartPointId(){
        $image = Image::where('image_type', 'extra_car_images')->first();
        return $image->id;
    }

    public function getCarModelImageStartPointId(){
        $image = Image::where('image_type', 'car_model')->first();
        if($image){
          return $image->id;
        }
        else{
          return 2;
        }
    }

    public function getCarImageStartPointId(){
        $image = Image::where('image_type', 'car')->first();
        if($image){
          return $image->id;
        }
        else{
          return 2;
        }
    }

    public function getPartManufacturerLogoStartPointId(){
        $logo = Image::where('image_type', 'part_manufacturer_logo')->first();
        if($logo){
          return $logo->id;
        }
        else{
          return 4;
        }
    }

    public function getPartCategoryImageStartPointId(){
        $image = Image::where('image_type', 'part_category')->first();
        if($image){
          return $image->id;
        }
        else{
          return 3;
        }
    }

    public function getPartSubCategoryImageStartPointId(){
        $image = Image::where('image_type', 'part_sub_category')->first();
        if($image){
          return $image->id;
        }
        else{
          return 3;
        }
    }

    public function getPartImageStartPointId(){
        $image = Image::where('image_type', 'part')->first();
        if($image){
          return $image->id;
        }
        else{
          return 3;
        }
    }
}
