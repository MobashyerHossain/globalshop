<?php

namespace App\Models\MultiAuth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword\ConsumerResetPasswordNotification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Purchase\Cart;
use App\Models\Purchase\Invoice;
use App\Models\Other\Image;
use App\Models\Product\CarMaker;
use App\Models\Product\Car;
use App\Models\Product\PartCategory;
use App\Models\Product\PartManufacturer;
use App\Models\Product\Part;
use App\Models\Other\Address;
use App\Models\Other\PhoneNumber;
use App\Models\Other\MyFavourite;
use App\Models\Purchase\ResentView;
use App\Models\Purchase\TestDriving;

class Consumer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'date_of_birth', 'profile_pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ConsumerResetPasswordNotification($token));
    }

    public function getFullName(){
        return $this->first_name.' '.$this->last_name;
    }

    public function getProfilePic(){
        if(Image::find($this->profile_pic)){
          return (Image::find($this->profile_pic))->uri;
        }
        else{
          return 'storage/images/temp.png';
        }
    }

    //consumers cart methods
    public function getCartProducts(){
        return Cart::where('consumer_id', $this->id)->where('sold', false)->orderBy('created_at', 'desc')->get();
    }

    public function getTotalAmountProducts(){
        return Cart::where('consumer_id', $this->id)->where('sold', false)->sum('quantity');
    }

    public function getTotalCostPerCart(){
        $carts = Cart::where('consumer_id', $this->id)->where('sold', false)->get();
        $total = 0;

        foreach ($carts as $cart) {
          $total += (double)substr($cart->getTotalPartCost(), 2, -4);
        }
        return (number_format((float)$total, 2, '.', ''));
    }

    public function getAddress(){
        return Address::find($this->address_id);
    }

    public function getPhoneNumber(){
        return PhoneNumber::find($this->phone_number_id);
    }

    public function getMyFavourites(){
        return MyFavourite::where('consumer_id', $this->id)->get();
    }

    public function getMyRecentViewedItems(){
        return ResentView::where('consumer_id', $this->id)->orderBy('created_at', 'desc')->limit(6)->get();
    }

    public function getRecommendation(){
        $recommendeds = array();
        if(Auth::check()){
          $recentcar = ResentView::where('consumer_id', Auth::id())->where('product_type', 'carmodel')->orderBy('times_visited', 'desc')->limit(2)->get();
          $recentpart = ResentView::where('consumer_id', Auth::id())->where('product_type', 'partsubcategory')->orderBy('times_visited', 'desc')->limit(2)->get();

          if(count($recentcar) > 0){
            foreach($recentcar as $model){
              if(count($model->getProduct()->getCars()) >=2){
                for ($i=0; $i < 2; $i++) {
                  $car = $model->getProduct()->getARandomCar();
                  array_push($recommendeds, $car);
                }
              }
              else {
                $car = $model->getProduct()->getARandomCar();
                array_push($recommendeds, $car);
              }
            }
          }

          if(count($recentpart) > 0){
            foreach($recentpart as $subcategory){
              if(count($subcategory->getProduct()->getParts()) >=2){
                for ($i=0; $i < 2; $i++) {
                  $part = $subcategory->getProduct()->getARandomPart();
                  array_push($recommendeds, $part);
                }
              }
              else {
                $part = $subcategory->getProduct()->getARandomPart();
                array_push($recommendeds, $part);
              }
            }
          }
        }

        $remaining = 8-count($recommendeds);

        for ($i=0; $i < $remaining ; $i++) {
            if($i%2 == 1){
              $product = Car::inRandomOrder()->first();
              array_push($recommendeds, $product);
            }
            else{
              $product = Part::inRandomOrder()->first();
              array_push($recommendeds, $product);
            }
        }

        shuffle($recommendeds);
        return $recommendeds;
    }

    public function getDateOfBirth(){
        return Carbon::parse($this->date_of_birth)->format('jS F Y');
    }

    public function getInvoices(){
        return Invoice::where('consumer_id', $this->id)->orderBy('created_at', 'desc')->get();
    }
}
