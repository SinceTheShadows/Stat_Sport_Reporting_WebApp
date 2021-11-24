<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class PpController extends Controller
{
    function logedUserData(){
        $user = User::where('token', '=',session('LogUser'))->first();$data = ['User' =>$user];return $data;}

//fuction check if user has a session and role
    function ifUserHadSessionAndRole(){
        if(session()->has('LogUser') && session()->has('RoleUser')){return "1";}else{return "0";}}

//check role
    function checkRole($givenRole){
        if(session('RoleUser') == $givenRole){return "1";}else {return "0";}}

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

}
