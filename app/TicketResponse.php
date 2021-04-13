<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketResponse extends Model
{
    protected $fillable = ['response'];


    public function user(){

        return $this->belongsTo('App/User','user_id');
    }

    public function staff(){

        return $this->belongsTo('App/User','staff_id');
    }
}
