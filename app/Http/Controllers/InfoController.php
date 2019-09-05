<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class InfoController extends  Controller{
      public function index(){
            $data = DB::select("select * from `info`");
            echo json_encode($data);
      }

      public function pwd(){
           $data =  DB::update("update `info` set `nickpwd`='1111' where id='1'");
              if($data){
                  $res =DB::select("select * from `info`");
                  echo json_encode($res);
              }else{
                  echo"出错";
              }

      }

        public function info(){
             $data = DB::update("update `info` set `nickname`='小2',`nickpwd`='1222',`images`='34' where id='1'");

             if($data){
                 $res = DB::select("select * from `info`");
                 $da['code']=0;
                 $da['msg']="请求成功";
                 $da['da'] = $res;
                 echo json_encode($da);
             }else{
                 echo '222222';
             }
        }
    public function images(){
        $data =  DB::update("update `info` set `images`='1111' where id='1'");
        if($data){
            $res =DB::select("select * from `info`");
            echo json_encode($res);
        }else{
            echo"出错";
        }

    }
}