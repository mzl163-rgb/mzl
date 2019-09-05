<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class LoController extends  Controller{
      public function login(){
           return view('login/login');
      }

        public function logins(){
           $name = isset($_REQUEST['name']);
           $pwd = isset($_REQUEST['pwd']);
           var_dump($name);die;
           $data = DB::select("select * from `login` where `name` = '$name' and `pwd` = '$pwd'");
           if($data){
               return view('login/login_list');
           }
        }
           public function login_list(){
               return view('login/login_list');
           }
}