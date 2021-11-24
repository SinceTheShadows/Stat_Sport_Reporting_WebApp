<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class JController extends Controller
{
    function logedUserData(){
        $user = User::where('token', '=',session('LogUser'))->first();$data = ['User' =>$user];return $data;}

//fuction check if user has a session and role
    function ifUserHadSessionAndRole(){
        if(session()->has('LogUser') && session()->has('RoleUser')){return "1";}else{return "0";}}

//check role
    function checkRole($givenRole){
        if(session('RoleUser') == $givenRole){return "1";}else {return "0";}}

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

}
