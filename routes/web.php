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

Route::group(['prefix'=>'admin','namespace'=>'Admin',],function(){
    //后台登录路由
    Route::get('login','LoginController@login');

    //处理后台登录的路由
    Route::post('dologin','LoginController@dologin');

    //加密算法
    Route::get('jiami','LoginController@jiami');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'isLogin'],function(){
    //后台首页
    Route::get('index','LoginController@index');
    //欢迎页路由
    Route::get('welcome','LoginController@welcome');
    //后台登出路由
    Route::get('logout','LoginController@logout');

    //后台普通管理员模块相关路由
    Route::resource('manager','SuperController');
    //管理员授权
    Route::get('manager/auth/{id}','SuperController@auth');
    Route::post('manager/doauth','SuperController@doAuth');

    //站点管理
    Route::resource('setting','SettingController');
    //图片类型管理
    Route::resource('pic_type','Pic_typeController');
    //链接类型管理
    Route::resource('link_type','Link_typeController');
    //图片内容管理
    Route::resource('pics/{id}/pics','PicController');
    //链接内容管理
    Route::resource('links/{id}/links','LinkController');
    //菜单管理
    Route::resource('menus/{id}/menus','MenusController');
    //信息类型管理
    Route::resource('cont_type/{id}/cont_type','Cont_typeController');
    //信息内容管理
    Route::resource('conts/{id}/conts/{id2}/conts','ContController');
});
