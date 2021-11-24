<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class EnController extends Controller
{
    function logedUserData(){
        $user = User::where('token', '=',session('LogUser'))->first();$data = ['User' =>$user];return $data;}

//fuction check if user has a session and role
    function ifUserHadSessionAndRole(){
        if(session()->has('LogUser') && session()->has('RoleUser')){return "1";}else{return "0";}}

//check role
    function checkRole($givenRole){
        if(session('RoleUser') == $givenRole){return "1";}else {return "0";}}

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
}
