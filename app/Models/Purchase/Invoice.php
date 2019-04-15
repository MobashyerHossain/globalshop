<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

use App\Models\MultiAuth\Consumer;
use App\Models\Purchase\Cart;

class Invoice extends Model
{
    //getter
    public function getConsumer(){
      return Consumer::find($this->consumer_id);
    }

    public function getTotalAmount(){
      return number_format((float)$this->total_amount, 2, '.', '');
    }

    public function getCartItems(){
      return Cart::where('invoice_id', $this->id)->get();
    }
}
