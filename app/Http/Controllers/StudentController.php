<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payments;
use App\Models\Student;

class StudentController extends Controller
{

    public function __construct()
    {
        // $this->;
    }

    public function addStudent(Request $request){
        $userId =auth()->user()->id;
        $refId =$request->input('payment');
        $payment =Payments::where(['ref_id'=>$refId,'user_id'=>$userId,'status'=>2])->first();
        if(empty($payment))
            return \abort(404);

        $data=$request->all();
        unset($data['payment']);
        $data['payment_id']=$payment->id;
        $data['user_id']=$userId;
        $student =Student::create($data);
        return \response('success',201);
    }

}