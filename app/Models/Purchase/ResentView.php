<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product\Car;
use App\Models\Product\Part;
use App\Models\Product\CarModel;
use App\Models\Product\PartSubCategory;

class ResentView extends Model
{
    public function getProduct(){
        if($this->product_type == 'car'){
            return Car::find($this->product_id);
        }
        else if($this->product_type == 'part'){
            return Part::find($this->product_id);
        }
        else if($this->product_type == 'carmodel'){
            return CarModel::find($this->product_id);
        }
        else{
            return PartSubCategory::find($this->product_id);
        }
    }
}
