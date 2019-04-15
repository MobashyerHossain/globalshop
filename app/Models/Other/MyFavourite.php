<?php

namespace App\Models\Other;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product\Part;
use App\Models\Product\Car;

class MyFavourite extends Model
{
    public function getProduct(){
        if($this->product_type == 'car'){
            return Car::find($this->product_id);
        }
        else{
            return Part::find($this->product_id);
        }
    }
}
