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

    //function returns loged user data
    function logedUserData(){
        $user = User::where('token', '=',session('LogUser'))->first();$data = ['User' =>$user];return $data;}

//fuction check if user has a session and role
    function ifUserHadSessionAndRole(){
        if(session()->has('LogUser') && session()->has('RoleUser')){return "1";}else{return "0";}}

//check role
    function checkRole($givenRole){
        if(session('RoleUser') == $givenRole){return "1";}else {return "0";}}

//dtn navigation
    function dashbord_dtn_dtn(){
        if($this->checkRole("dtn")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.dtn.dtn_dtn",$this->logedUserData() );}
            else {return redirect('login');}}else{return redirect('login');}}
    function dashbord_dtn_en(){
        if($this->checkRole("dtn")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.dtn.dtn_en",$this->logedUserData() );}
            else {return redirect('login');}}else{return redirect('login');}}
    function dashbord_dtn_pp(){
        if($this->checkRole("dtn")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.dtn.dtn_pp",$this->logedUserData() );}
            else {return redirect('login');}}else{return redirect('login');}}
    function dashbord_dtn_j(){
        if($this->checkRole("dtn")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.dtn.dtn_j",$this->logedUserData() );}
            else {return redirect('login');}}else{return redirect('login');}}
    function dashbord_dtn_form(){
        if($this->checkRole("dtn")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.dtn.dtn_form",$this->logedUserData() );}
            else {return redirect('login');}}else{return redirect('login');}
    }

// en navigation
    function dashbord_en_dtn(){
        if($this->checkRole("en")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.en.en_dtn",$this->logedUserData() );}
            else { return redirect('login');}}else {return redirect('login');}}
    function dashbord_en_en(){
        if($this->checkRole("en")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.en.en_en",$this->logedUserData() );}
            else { return redirect('login');}}else {return redirect('login');}}
    function dashbord_en_pp(){
        if($this->checkRole("en")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.en.en_pp",$this->logedUserData() );}
            else { return redirect('login');}}else {return redirect('login');}}
    function dashbord_en_j(){
        if($this->checkRole("en")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.en.en_j",$this->logedUserData() );}
            else { return redirect('login');}}else {return redirect('login');}}
    function dashbord_en_form(){
        if($this->checkRole("en")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.en.en_form",$this->logedUserData() );}
            else { return redirect('login');}}else {return redirect('login');}
    }


//pp navigation
    function dashbord_pp_dtn(){
        if($this->checkRole("pp")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.pp.pp_dtn",$this->logedUserData() );}
            else{return redirect('login');}}else {return redirect('login');}}
    function dashbord_pp_en(){
        if($this->checkRole("pp")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.pp.pp_en",$this->logedUserData() );}
            else{return redirect('login');}}else {return redirect('login');}}
    function dashbord_pp_pp(){
        if($this->checkRole("pp")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.pp.pp_pp",$this->logedUserData() );}
            else{return redirect('login');}}else {return redirect('login');}}
    function dashbord_pp_j(){
        if($this->checkRole("pp")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.pp.pp_j",$this->logedUserData() );}
            else{return redirect('login');}}else {return redirect('login');}}
    function dashbord_pp_form(){
        if($this->checkRole("pp")=="1"){
            if($this->ifUserHadSessionAndRole()=="1"){
                return view("dash.pp.pp_form",$this->logedUserData() );}
            else{return redirect('login');}}else {return redirect('login');}
    }

//j navigation
    function dashbord_j_dtn(){
        if($this->checkRole("j") == "1"){
            if($this->ifUserHadSessionAndRole() == "1"){
                return view("dash.j.j_dtn",$this->logedUserData() );}
            else {return redirect('login');}}else {return redirect('login');}}
    function dashbord_j_j(){
        if($this->checkRole("j") == "1"){
            if($this->ifUserHadSessionAndRole() == "1"){
                return view("dash.j.j_j",$this->logedUserData() );}
            else {return redirect('login');}}else {return redirect('login');}}
    function dashbord_j_form(){
        if($this->checkRole("j") == "1"){
            if($this->ifUserHadSessionAndRole() == "1"){
                return view("dash.j.j_form",$this->logedUserData() );}
            else {return redirect('login');}}else {return redirect('login');}
    }

//Med Navigation
    function dashbord_med(){
        return view('dash.med.med');
    }

//ev Navigation
    function dashbord_ev(){
        return view('dash.ev.ev');
    }
//Logout
    function Logout(){
        if(session()->has('LogUser') && session()->has('RoleUser')){session()->pull('LogUser');
            session()->pull('RoleUser');return redirect('login');}}

    //test function
    function welcome(){
        return view('welcome');
    }
}
