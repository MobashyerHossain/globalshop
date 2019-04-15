<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product\CarModel;
use App\Models\Product\CarMaker;
use App\Models\Product\Car;
use App\Models\Other\Image;

class CarMaker extends Model
{
    //getter
    public function getModel($v){
        return CarModel::where('maker_id', $v)->get();
    }

    public function getModels(){
        return CarModel::where('maker_id', $this->id)->get();
    }

    public function getLogo(){
        return (Image::find($this->logo))->uri;
    }

    public function getShortedName($len){
      if(strlen($this->name) > $len){
        return substr($this->name, 0, $len).'...';
      }
      else{
        return $this->name;
      }
    }

    public function getRandomImage(){
        $model = $this->getModels()[rand(0,count($this->getModels())-1)];
        $car = $model->getCars()[rand(0,count($model->getCars())-1)];
        return $car->getImage();
    }

    public function getImageById($id){
      if($id == 1){
          if($this->name == 'BMW'){
              return Car::find(4)->getImage();
          }
          elseif($this->name == 'Lamborghini'){
              return Car::find(20)->getImage();
          }
          elseif($this->name == 'Audi'){
              return Car::find(27)->getImage();
          }
          elseif($this->name == 'Mercedes-Benz'){
              return Car::find(54)->getImage();
          }
          else{
            return getRandomImage();
          }
      }
      elseif($id == 2){
          if($this->name == 'BMW'){
              return Car::find(6)->getImage();
          }
          elseif($this->name == 'Lamborghini'){
              return Car::find(17)->getImage();
          }
          elseif($this->name == 'Audi'){
              return Car::find(36)->getImage();
          }
          elseif($this->name == 'Mercedes-Benz'){
              return Car::find(56)->getImage();
          }
          else{
            return getRandomImage();
          }
      }
      else{
        return getRandomImage();
      }
    }
}
