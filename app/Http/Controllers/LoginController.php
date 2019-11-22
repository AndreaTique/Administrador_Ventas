<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;
use App\User;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    // use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    // /**
    //  * Create a new authentication controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct(Guard $auth1)
    // {
    //     $this->auth1 = $auth1;
    //     $this->middleware('guest', ['except' => 'getLogout']);
      
    // }

    // /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */
   


//login

       protected function getLogin()
    {
        return view("Login/login");
    }

    


       

   public function postLogin(Request $request)
   {
    $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
    ]);



    $credentials = $request->only('email', 'password');

   
    return Redirect("home");
    



    }


//login

 //registro   


        protected function getRegister()
    {
        return view("registro");
    }


        

        protected function postRegister(Request $request)

   {
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
    ]);


    $data = $request;


    $user=new User;
    $user->name=$data['name'];
    $user->email=$data['email'];
    $user->password=bcrypt($data['password']);


    if($user->save()){

        return redirect('Login/login');
               
    }
   

   

}

//registro

protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect('Login/login');
    }






}