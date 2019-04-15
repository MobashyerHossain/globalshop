<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Models\Other\Image;
use App\Models\Other\MoreImage;
use App\Models\Product\PartSubCategory;
use App\Models\Product\Part;
use App\Models\Product\PartManufacturer;
use App\Models\Product\ProductDetail;
use App\Models\Product\PartsForCar;
use App\Models\Product\ProductInventory;
use App\Models\Purchase\Cart;
use App\Models\Other\MyFavourite;
use App\Models\Purchase\ResentView;

class Part extends Model
{
    //getter
    public function getImage(){
        if($this->image_id == 3){
          return $this->getSubCategory()->getImage();
        }
        if(Image::find($this->image_id)){
          return (Image::find($this->image_id))->uri;
        }
    }

    public function getExtraImage(){
        return MoreImage::where('product_type', 'part')->where('product_id', $this->id)->get();
    }

    public function getSubCategory(){
        return PartSubCategory::find($this->sub_category_id);
    }

    public function getManufacturer(){
        return PartManufacturer::find($this->manufacturer_id);
    }

    public function getDetails(){
        return ProductDetail::where('product_type','part')->where('product_id', $this->id)->get();
    }

    public function getForWhichCar(){
        return PartsForCar::where('part_id', $this->id)->get();
    }

    public function getNormalPrice(){
      return '$ '.(number_format((float)$this->selling_price, 2, '.', ''));
    }

    public function getBuyingPrice(){
      return '$ '.(number_format((float)$this->buying_price, 2, '.', ''));
    }

    public function getDiscountedPrice(){
      $price = ($this->selling_price - ($this->current_discount*$this->selling_price));
      return '$ '.(number_format((float)$price, 2, '.', ''));
    }

    public function getDiscount(){
      return '- '.($this->current_discount*100).' %';
    }

    public function getTotalStock(){
        return ProductInventory::where('product_type', 'part')->where('product_id', $this->id)->sum('quantity') - Cart::where('part_id', $this->id)->sum('quantity');
    }

    public function getOurStock(){
        return ProductInventory::where('product_type', 'part')->where('product_id', $this->id)->where('showroom_id', Auth::guard('showroomstaff')->user()->getShowRoom()->id)->sum('quantity');
    }

    public function getInventory(){
        return ProductInventory::where('product_type', 'part')->where('product_id', $this->id)->where('quantity', '>', 0)->orderBy('quantity', 'desc')->get();
    }

    public function getType(){
      return 'part';
    }

    public function isAlreadyFavourited(){
      return MyFavourite::where('product_type', 'part')->where('product_id', $this->id)->where('consumer_id', Auth::id())->first();
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
      return ResentView::where('product_type', 'part')->where('product_id', $this->id)->sum('times_visited');
    }
}
