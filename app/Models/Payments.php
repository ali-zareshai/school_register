<?php

namespace App\Models;


class Payments extends BaseModel
{
    public $table = 'payments';

    public function user(){
        return $this->belongsTo(User::class,'user_id','id'); 
    }

    public function student(){
        return $this->belongsTo(Student::class,'payment_id','id'); 
    }

}