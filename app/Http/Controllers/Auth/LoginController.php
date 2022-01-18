<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $request;
    protected $chinaUsers;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->request = $request;
        
    }

    protected function validateLogin()
    {
        $validationCheck =[
            $this->username() => 'required|string',
            'password' => 'required|string'
        ];

        $this->request->validate($validationCheck);
    }

    /**
       * Get the needed authorization credentials from the request.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return array
       */
      protected function credentials()
      {
        if(is_numeric($this->request->get('email'))){
          return ['mobile'=>$this->request->get('email'),'password'=>$this->request->get('password')];
        }
        elseif (filter_var($this->request->get('email'), FILTER_VALIDATE_EMAIL)) {
          return ['email' => $this->request->get('email'), 'password'=>$this->request->get('password')];
        }
      }

      /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function authenticated($user)
    {
        session(['lang'=>auth()->user()->languate]);
        return redirect('/');
        
    }
}
