<?php

namespace App\Models;


class Payments extends BaseModel
{
    public $table = 'payments';

    public function user(){
        return $this->belongsTo(User::class,'user_id','id'); 
    }

}