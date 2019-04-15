<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use App\Models\MultiAuth\Consumer;
use App\Models\Product\Car;

class CarBooking extends Model
{
    public function getCar(){
        return Car::find($this->car_id);
    }

    public function getConsumer(){
        return Consumer::find($this->consumer_id);
    }

    public function getTimeRemainingToClaim(){
        return Carbon::now()->diffForHumans(Carbon::parse($this->created_at)->addWeek(), true, false, 2);
    }
}
