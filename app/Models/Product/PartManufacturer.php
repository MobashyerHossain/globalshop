<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Other\Image;
use App\Models\Product\Part;
use App\Models\Product\PartManufacturer;

class PartManufacturer extends Model
{
    //getter
    public function getLogo(){
        if(Image::find($this->logo)){
          return (Image::find($this->logo))->uri;
        }
        else{
          return 'storage/Images/tempManufacturerLogo.png';
        }
    }

    public function getparts(){
        return Part::where('manufacturer_id', $this->id)->get();
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
