<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'user_id', 'status','ticket_ref','subject','message','department','file'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
