<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\NaturalPerson;
use App\LegalPerson;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function showRegister(){
        return view('auth.register');
    }

    public function postRegister(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|max:20',
            'name_family'=>'required|persian_alpha|max:25',
            'mobile'=>'required|ir_mobile:zero|unique:users'
        ]);

        if ($validator->fails()) {
            return view('auth.register')->withErrors($validator->errors());
        }
        
                $user =User::create([
                    'mobile'=>$request->mobile,
                    'email'=>$request->email,
                    'name'=>$request->name_family,
                    'password'=>bcrypt($request->password)
                ]);
                $user->assignRole(['customer']);

                return redirect()->to('/');
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $mobile = session('mobile');
        $user = User::where('mobile', $mobile)->first();
        if ($user) {
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->active = true;
            $user->type = $data['type'];
            $user->save();

            if ($data['type'] == 1)
                NaturalPerson::create(['user_id' => $user->id, 'birthDate' => ' ', 'vacExpire' => '']);

            if ($data['type'] == 2)
                LegalPerson::create(['user_id' => $user->id, 'vac_expire_date' => '', 'signs' => [], 'bank_account' => [], 'chairmans' => []]);

            session()->flush();
            return $user;
        }
    }
}
