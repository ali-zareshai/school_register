<?php

namespace App\Models;


class Student extends BaseModel
{
    public $table = 'students';

    public function user(){
        return $this->belongsTo(User::class,'user_id','id'); 
    }

    public function payment(){
        return $this->belongsTo(Payments::class,'payment_id','id'); 
    }

}