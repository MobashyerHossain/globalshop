<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product\CarMaker;
use App\Models\Product\CarModel;
use App\Models\Product\Car;
use App\Models\Other\Image;

class CarModel extends Model
{
    //getter
    public function getCars(){
        return Car::where('model_id', $this->id)->get();
    }

    public function getMaker(){
        return CarMaker::find($this->maker_id);
    }

    public function getImage(){
        return (Image::find($this->image_id))->uri;
    }

    public function getShortedName($len){
      if(strlen($this->name) > $len){
        return substr($this->name, 0, $len).'...';
      }
      else{
        return $this->name;
      }
    }

    public function getType(){
      return 'carmodel';
    }

    public function getARandomCar(){
        return Car::where('model_id', $this->id)->inRandomOrder()->first();
    }
}
