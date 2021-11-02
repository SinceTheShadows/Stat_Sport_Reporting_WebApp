<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAuthController extends Controller
{
    function login() {
        return view ('auth.login');
    }
    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'token'=>'required'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if($request->token == $user->token){
                $request->session()->put('LoggedUser', $user->token);
                return redirect('dashbord');
            }
            else{
                return back()->with('Fail', 'wrong password');
            }
        }
        else{
            return back()->with('Fail', 'No account found with this email');
        }

    }
    function dashbord(){
        return view ('dash.dtn');
    }
}
