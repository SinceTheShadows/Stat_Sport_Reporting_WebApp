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
        $user = User::where('token', '=',$request->token)->first();
        // return $user;
        if($user != null){
            if($request->email == $user->email){
                $request->session()->put('LogUser', $user->token);
                if($user->role == "dtn"){
                    return redirect('dashbord_dtn');
                }elseif($user->role == "en"){
                    return redirect('dashbord_en');
                }elseif($user->role == "pp"){
                    return redirect('dashbord_pp');
                }elseif($user->role == "j"){
                    return redirect('dashbord_j');
                }else{
                    return redirect('login');
                }
                // return redirect('dashbord');
            }
            else{
                // return back()->with( 'No account found with this email');
                return back()->withErrors(['msg' => 'No account found with this email']);
            }
        }
        else{
            // return back()->with( 'No account found with this token');
            return back()->withErrors(['msg' => 'No account found with this token']);
        }

    }
    function dashbord_dtn(){
        return view ('dash.dtn');
    }
    function dashbord_en(){
        return view ('dash.en');
    }
    function dashbord_pp(){
        return view ('dash.pp');
    }
    function dashbord_j(){
        return view ('dash.j');
    }

}
