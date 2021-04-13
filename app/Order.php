<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'order_no','product_id','qty','status','staff_id','address','city','country','status'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    
    // USER TO ORDER RELATIONSHIP
    //ONE TO MANY
    //EACH USER CAN HAVE MANY ORDERS
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function staff()
    {
        return $this->belongsTo('App\User','staff_id');
    }
}
