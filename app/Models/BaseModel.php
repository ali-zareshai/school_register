<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class BaseModel extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $casts = [
        'options' => 'array',
    ];
    protected $hidden = ['deleted_at', 'updated_at'];
    // protected $dateFormat = 'Y-m-d H:m:s';


}
