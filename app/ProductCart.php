<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    
    public function order(){
        return $this->belongsToMany("App\Order");
    }
}
