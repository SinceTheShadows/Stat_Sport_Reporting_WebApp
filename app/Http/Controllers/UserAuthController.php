<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserAuthController extends Controller
{
    function login() {
        if(session()->has('LogUser') && session()->has('RoleUser')){
            if(session('RoleUser') == "dtn"){
                return redirect('dashbord_dtn');
            }elseif(session('RoleUser') == "en"){
                return redirect('dashbord_en');
            }elseif(session('RoleUser') == "pp"){
                return redirect('dashbord_pp');
            }elseif(session('RoleUser') == "j"){
                return redirect('dashbord_j');
            }else{
                return redirect('login');
            }
        }else {
            return view ('auth.login');
        }
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
                $request->session()->put('RoleUser', $user->role);
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
        if(session()->has('LogUser') && session()->has('RoleUser')){
            $user = User::where('token', '=',session('LogUser'))->first();
            $data = [
                'User' =>$user
            ];
            return view ('dash.dtn.dtn', $data);
        }else{
            return redirect('login');
        }
    }
    function dashbord_en(){
        if(session()->has('LogUser') && session()->has('RoleUser')){
            $user = User::where('token', '=',session('LogUser'))->first();
            $data = [
                'User' =>$user
            ];
            return view ('dash.en.en', $data);
        }else{
            return redirect('login');
        }
    }
    function dashbord_pp(){
        if(session()->has('LogUser') && session()->has('RoleUser')){
            $user = User::where('token', '=',session('LogUser'))->first();
            $data = [
                'User' =>$user
            ];
            return view ('dash.pp.pp',$data);
        }else{
            return redirect('login');
        }
    }
    function dashbord_j(){
        if(session()->has('LogUser') && session()->has('RoleUser')){
            $user = User::where('token', '=',session('LogUser'))->first();
            $data = [
                'User' =>$user
            ];
            return view ('dash.j.j',$data);
        }else{
            return redirect('login');
        }
    }
    function Logout(){
        if(session()->has('LogUser') && session()->has('RoleUser')){
            session()->pull('LogUser');
            session()->pull('RoleUser');
            return redirect('login');
        }
    }

}
