<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class SController extends  Controller{
   public function login(){
        return view('login1/login');
   }
   public function login1(){
       $secret = "7c4a8d09ca3762af61e59520943dc26494f8941b";
       $data['username'] = "王五";
       $data['userpwd'] = md5(123457);
       $data['rand'] = rand(110000,99999999);
       $data['time'] = time();
//       $res = krsort($data);



        ksort($data);

         $str = "";
       foreach ($data as $k => $v){
           $str = $k."=".$v."&".$str;
       }
          $str  =rtrim($str,"&");

       $str ="http://www.lgc.com/info/login1?".rtrim($str,"&");
       $send = $str;
       $sign =  md5($str);
       $newsign = md5(md5($str).$secret);

       echo $newsign;


       $curl = curl_init();

       curl_setopt_array($curl, array(
           CURLOPT_URL => $send,
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => "",
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 30,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => "POST",
           CURLOPT_POSTFIELDS => "",
           CURLOPT_HTTPHEADER => array(
               "Postman-Token: 19535bf2-1521-4ef9-9a08-8d283253a423",
               "cache-control: no-cache",
               "sigin:$newsign;"
           ),
       ));

       $response = curl_exec($curl);
       $err = curl_error($curl);

       curl_close($curl);

       if ($err) {
           echo "cURL Error #:" . $err;
       } else {
           echo $response;
       }
   }

      public function li(){
          return view('a');
      }












































           public function list(){
              return view('sc/list');
           }

             public function  show(){
                 return view('sc/show');
             }
              public function show1(){
                  $name = $_REQUEST['text'];
                $res =   DB::insert("INSERT INTO `text` (`text`) VALUES ('$name')");
               if($res){
                    $data = select("select * from `text`");
                    return view('sc/show',['data'=>$data]);
               }
   }
}