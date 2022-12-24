<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginShow()
    {
        return view('V1.auth.login');
    }
    public function login(LoginRequest $request)
    {

        try{
            if(auth()->attempt(['user_name'=>$request->user_name,'password'=>$request->password]) || auth()->attempt(['mobile1'=>$request->user_name,'password'=>$request->password]) ||auth()->attempt(['email'=>$request->user_name,'password'=>$request->password]))
            {

                return redirect()->route('home')->with('success',"You are logged in");
            }else{
                return back()->withErrors([
                    'user_name' =>'The provided credentials do not match our records.',
                ])->onlyInput('user_name');
            }
        }catch(Exception $ex)
        {
            return redirect()->route('login.show')->with(['error'=>trans('main_trans.Something Went Wrong Please Try Again')]);
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.show')->with(['alert'=>"You left"]);    }
}
