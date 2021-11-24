<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAuthController extends Controller
{
    function login() {
        if(session()->has('LogUser') && session()->has('RoleUser')){
            if(session('RoleUser') == "dtn"){return redirect('dashbord_dtn_dtn');
            }elseif(session('RoleUser') == "en"){return redirect('dashbord_en_dtn');
            }elseif(session('RoleUser') == "pp"){return redirect('dashbord_pp_dtn');
            }elseif(session('RoleUser') == "j"){return redirect('dashbord_j_dtn');
            }elseif(session('RoleUser') == "med"){return redirect('dashbord_med');
            }elseif(session('RoleUser') == "ev"){return redirect('dashbord_ev');}
            else{return redirect('login');}}else {return view ('auth.login');}}

    function check(Request $request){
        $request->validate(['email'=>'required|email','token'=>'required','g-recaptcha-response' => 'required|captcha']);
        $user = User::where('token', '=',$request->token)->first();
        if($user != null){
            if($request->email == $user->email){
                $request->session()->put('LogUser', $user->token);
                $request->session()->put('RoleUser', $user->role);
                if($user->role == "dtn"){return redirect('dashbord_dtn_dtn');
                }elseif($user->role == "en"){return redirect('dashbord_en_dtn');
                }elseif($user->role == "pp"){return redirect('dashbord_pp_dtn');
                }elseif($user->role == "j"){return redirect('dashbord_j_dtn');      
                }elseif($user->role == "med"){return redirect('dashbord_med');      
                }elseif($user->role == "ev"){return redirect('dashbord_ev');      
                }else{return redirect('login');}
            }else{return back()->withErrors(['msg' => 'No account found with this email']);}
        }else{return back()->withErrors(['msg' => 'No account found with this token']);}}

        
//Logout
    function Logout(){
        if(session()->has('LogUser') && session()->has('RoleUser')){session()->pull('LogUser');
            session()->pull('RoleUser');return redirect('login');}}

    //test function
    function welcome(){
        return view('welcome');
    }
}
