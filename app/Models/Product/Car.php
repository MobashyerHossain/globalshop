<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Models\Other\Image;
use App\Models\Other\MoreImage;
use App\Models\Product\CarModel;
use App\Models\Product\ProductDetail;
use App\Models\Product\ProductInventory;
use App\Models\Other\MyFavourite;
use App\Models\Purchase\ResentView;
use App\Models\Purchase\CarBooking;
use App\Models\Purchase\TestDriving;
use App\Models\Purchase\LoanInfo;
use App\Models\Product\Car;

class Car extends Model
{
    //getter
    public function getImage(){
        if($this->image_id == 2){
          return $this->getModel()->getImage();
        }
        else{
          return (Image::find($this->image_id))->uri;
        }
    }

    public function getExtraImage(){
        return MoreImage::where('product_type', 'car')->where('product_id', $this->id)->get();
    }

    public function getModel(){
        return CarModel::find($this->model_id);
    }

    public function getDetails(){
        return ProductDetail::where('product_type','car')->where('product_id', $this->id)->get();
    }

    public function getNormalPrice(){
      return '$ '.(number_format((float)$this->selling_price, 2, '.', ''));
    }

    public function getBuyingPrice(){
      return '$ '.(number_format((float)$this->buying_price, 2, '.', ''));
    }

    public function getDiscountedPrice(){
      $discountedprice = ($this->selling_price - ($this->current_discount*$this->selling_price));
      return '$ '.(number_format((float)$discountedprice, 2, '.', ''));
    }

    public function getFractionalPrice($frac){
      $discountedprice = ($this->selling_price - ($this->current_discount*$this->selling_price));
      $fracprice = $discountedprice * ($frac/100);
      return '$ '.(number_format((float)$fracprice, 2, '.', ''));
    }

    public function getDiscount(){
      return '- '.($this->current_discount*100).' %';
    }

    public function getTotalStock(){
        return ProductInventory::where('product_type', 'car')->where('product_id', $this->id)->sum('quantity') - count($this->getTotalBooked());
    }

    public function getOurStock(){
        return ProductInventory::where('product_type', 'car')->where('product_id', $this->id)->where('showroom_id', Auth::guard('showroomstaff')->user()->getShowRoom()->id)->sum('quantity');
    }

    public function getInventory(){
        return ProductInventory::where('product_type', 'car')->where('product_id', $this->id)->where('quantity', '>', 0)->orderBy('quantity', 'desc')->get();
    }

    public function getType(){
      return 'car';
    }

    public function isAlreadyFavourited(){
      return MyFavourite::where('product_type', 'car')->where('product_id', $this->id)->where('consumer_id', Auth::id())->first();
    }

    public function getShortedName($len){
      if(strlen($this->name) > $len){
        return substr($this->name, 0, $len).'...';
      }
      else{
        return $this->name;
      }
    }

    public function getTotalViews(){
      return ResentView::where('product_type', 'car')->where('product_id', $this->id)->sum('times_visited');
    }

    public function getBookingInfo(){
        return CarBooking::where('consumer_id', Auth::id())->where('car_id', $this->id)->first();
    }

    public function getTotalBooked(){
        return CarBooking::where('car_id', $this->id)->where('status', 'onhold')->orWhere('status', 'sold')->get();
    }

    public function getTestDrivingInfo(){
        return TestDriving::where('consumer_id', Auth::id())->where('car_id', $this->id)->first();
    }

    public function getLoanInfo(){
        return LoanInfo::where('consumer_id', Auth::id())->where('car_id', $this->id)->first();
    }
}
