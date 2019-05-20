<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class Order extends Model
{
  protected $fillable = [
    'user_id', 'status', 'total_price', 'shipping_address', 'zip_code'
  ];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function orderItems(){
    return $this->hasMany('App\Models\OrderItem');
  }

  public function joinProduct($id){
    return $orderProducts = DB::table('orders')
                            ->join('products','products.user_id','=','orders.user_id')
                            ->select('products.image_url', 'orders.*')
                            ->where('orders.id', '=', $id)
                            ->get();
  }
}
