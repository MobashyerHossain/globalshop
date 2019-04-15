<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

use App\Models\MultiAuth\Consumer;
use App\Models\Product\Car;

class LoanInfo extends Model
{
    public function getConsumer(){
      return Consumer::find($this->consumer_id);
    }

    public function getCar(){
        return Car::find($this->car_id);
    }
}
