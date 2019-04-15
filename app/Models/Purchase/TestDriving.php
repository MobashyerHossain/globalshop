<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

use App\Models\MultiAuth\Consumer;
use App\Models\MultiAuth\ShowRoom\ShowRoom;
use App\Models\Product\Car;

class TestDriving extends Model
{
    public function getCar(){
        return Car::find($this->car_id);
    }

    public function getConsumer(){
        return Consumer::find($this->consumer_id);
    }
}
