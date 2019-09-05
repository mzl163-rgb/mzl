<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin'],function(){
    Route::get('header',function(){
        return view('admin/admin_heder');
    });Route::get('foot',function(){
        return view('admin/admin_foot');
    });
    Route::get('nv',function(){
        return view('admin/admin_list');
    });


    Route::any('/navigations_list','AdminController@navigations_list');
    Route::get('/navigations_add','AdminController@navigations_add');
    Route::get('/admin_users_list','AdminController@admin_users_list');
    Route::get('/admin_users_add','AdminController@admin_users_add');
    Route::get('/adverts_list','AdminController@adverts_list');
    Route::get('/adverts_add','AdminController@adverts_add');
    Route::get('/advert_postitions_add','AdminController@advert_postitions_add');
    Route::get('/advert_postitions_list','AdminController@advert_postitions_list');
    Route::get('/articles_list','AdminController@articles_list');
    Route::get('/articles_add','AdminController@articles_add');
    Route::get('/carousels_list','AdminController@carousels_list');
    Route::get('/carousels_add','AdminController@carousels_add');
    Route::get('/categories_list','AdminController@categories_list');
    Route::get('/categories_add','AdminController@categories_add');
    Route::get('/site_settings_list','AdminController@site_settings_list');
    Route::get('/site_settings_add','AdminController@site_settings_add');
    Route::get('/log_list','AdminController@log_list');
    Route::get('/log_add','AdminController@log_add');
    Route::get('/nv_show','AdminController@nv_show');

    Route::any('/del','AdminController@del');
    Route::any('/nv_add','AdminController@nv_add');
    Route::any('/add','AdminController@add');
    Route::any('/nv_update','AdminController@nv_update');
    Route::any('/login_if','AdminController@login_if');
});

Route::get('/ad','AdminController@add');
//Route::get('/navigations_list','AdminController@navigations_list');

    Route::get('/login','LoController@login');
    Route::get('/logins','LoController@logins');
    Route::get('/login_list','LoController@login_list');
    Route::get('info/index','InfoController@index');
    Route::get('info/pwd','InfoController@pwd');
    Route::get('info/pwd','InfoController@pwd');
    Route::get('info/pwd','InfoController@pwd');
    Route::get('info/info','InfoController@info');
    Route::get('info/images','InfoController@images');
    Route::get('info/login','SController@login');
    Route::post('info/login1','SController@login1');
    Route::get('li','SController@li');
    Route::get('list','SController@list');
    Route::get('show','SController@show');
    Route::post('show1','SController@show1');
























Route::any('index','InfoController@index');


