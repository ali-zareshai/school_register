<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payments;

class UserController extends Controller
{
   
    public function __construct()
    {
        // $this->;
    }

    public function getCurrentUserPayments(Request $request){
        $students =Payments::with(['student'])
            ->where('user_id',auth()->user()->id)
            ->where('status',2)
            ->orderBy('payment_at','DESC')
            ->paginate($request->input('per-page',15));

        return response($students,200);
    }

}