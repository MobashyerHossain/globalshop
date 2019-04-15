<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Other\Image;
use App\Models\Product\PartCategory;
use App\Models\Product\PartSubCategory;

class PartCategory extends Model
{
    //getter
    public function getImage(){
        if(Image::find($this->image_id)){
          return (Image::find($this->image_id))->uri;
        }
        else{
          return 'storage/Images/tempCategory.png';
        }
    }

    public function getSubCategories(){
        return PartSubCategory::where('category_id', $this->id)->get();
    }

    public function getShortedName($len){
      if(strlen($this->name) > $len){
        return substr($this->name, 0, $len).'...';
      }
      else{
        return $this->name;
      }
    }
}
