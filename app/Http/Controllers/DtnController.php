<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DtnController extends Controller
{
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


}
