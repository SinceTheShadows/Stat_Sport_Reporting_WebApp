<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class MedController extends Controller
{
    function logedUserData(){
        $user = User::where('token', '=',session('LogUser'))->first();$data = ['User' =>$user];return $data;}

//fuction check if user has a session and role
    function ifUserHadSessionAndRole(){
        if(session()->has('LogUser') && session()->has('RoleUser')){return "1";}else{return "0";}}

//check role
    function checkRole($givenRole){
        if(session('RoleUser') == $givenRole){return "1";}else {return "0";}}


    //Med Navigation
    function dashbord_med(){
        return view('dash.med.med');
    }

}
