<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class product_reviews extends Model
{
    //
    protected $fillable = ['product_id', 'user_id', 'rating', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function rating($id)
    {
        $avg = DB::table('product_reviews')
                ->where('product_id', $id)
                ->avg('rating');
        return $avg;
    }
}

