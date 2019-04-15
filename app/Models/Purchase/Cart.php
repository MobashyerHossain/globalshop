<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product\Part;
use App\Models\MultiAuth\Consumer;

class Cart extends Model
{
    //getter
    public function getPart(){
      return Part::find($this->part_id);
    }

    public function getConsumer(){
      return Consumer::find('consumer_id');
    }

    public function getTotalPartCost(){
      $part = Part::find($this->part_id);
      $cost = ($part->selling_price * $this->quantity);
      return '$ '.(number_format((float)$cost, 2, '.', '')).' USD';
    }
}
