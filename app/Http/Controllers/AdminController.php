<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class AdminController extends  Controller{
     public function add(){
          return view('admin/admin_login');
}
     public function login_if(){
          $name = isset($_REQUEST['name']);
          $pwd = isset($_REQUEST['pwd'])
          ;
          $data = DB::select("select * from `login` where `name`='$name' and `pwd`='$pwd'");
           if($data){
               return view('admin/admin_list');
           }else{
               return view('admin/admin_login');
               exit("登陆失败");
           }
     }

       public function navigations_list(){
           return view('navigations/navigations_list');
       }
    public function nv_show(){
        $res = DB::select("select * from `navigations`");
        $data['code'] = 0;
        $data['msg'] = "成功";
        $data['data'] = $res;
        echo json_encode($data);
    }
      public function del()
      {
          $id=$_REQUEST['id'];
          $aa=DB::delete("delete from `navigations` where id='$id' ");
          if($aa)
          {
              echo "删除成功";
          }
      }

         public function nv_add(){
           $name = $_REQUEST['name'];
           $url = $_REQUEST['url'];
           $pid = $_REQUEST['pid'];
           $order = $_REQUEST['order'];
           $catime = date('Y-m-d H-i-s');
             $uptime = date('Y-m-d H-i-s');

             $res = DB::insert("INSERT INTO `navigations` (`name`, `url`, `pid`, `order`, `created_at`, `updated_at`) VALUES ('$name', '$url', '$pid', '$order', '$catime', '$uptime')");

             if($res){
                 return view('navigations/navigations_list');
             }

}
        public function nv_update(){
         echo 1111;
//             $id = isset($_GET['id']);
//             print_r($id);
//             $data = DB::table('navigations')->where('id',$id)->first();
//             return view('navigations/navigations_update',['data'=>$data]);
        }
       public function navigations_add(){
           return view('navigations/navigations_add');
       } public function admin_users_list(){
           return view('admin_users_list/admin_users_list');
       } public function admin_users_add(){
           return view('admin_users_list/admin_users_add');
       }public function adverts_list(){
           return view('adverts_list/adverts_list');
       }public function adverts_add(){
           return view('adverts_list/adverts_add');
       }
    public function advert_postitions_list(){

        return view('advert_postitions/advert_postitions_list');

    }
    public function advert_postitions_add()
    {
        return view('advert_postitions/advert_postitions_add');
    }

    public function articles_list(){

        return view('articles/articles_list');

    }
    public function articles_add()
    {
        return view('carousels/articles_add');
    }public function carousels_list(){

        return view('carousels/carousels_list');

    }
    public function carousels_add()
    {
        return view('carousels/carousels_add');
    }public function categories_list(){

        return view('categories/categories_list');

    }
    public function categories_add()
    {
        return view('categories/categories_add');
    }public function log_list(){

        return view('submi/submi_list');

    }
    public function log_add()
    {
        return view('submi/submi_add');
    }public function site_settings_list(){

        return view('site_settings/site_settings_list');

    }
    public function site_settings_add()
    {
        return view('site_settings/site_settings_add');
    }
}

