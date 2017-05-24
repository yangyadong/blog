<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['namespace' => 'Home'], function() {
    Route::get('/', 'IndexController@index');//博客首页
    Route::get('/Home/index', 'IndexController@index');//博客首页
    Route::get('/Home/title_more', 'IndexController@title_page');//博客首页加载更多
    Route::get('/Home/about', 'IndexController@about');//关于我
    Route::get('/Home/moodlist', 'IndexController@moodlist');//碎言碎语
    Route::get('/Home/moodlist_more', 'IndexController@moodlist_more');//碎言碎语加载更多
    Route::get('/Home/knowledge', 'IndexController@knowledge');//学无止境
    Route::get('/Home/knowledge_more', 'IndexController@knowledge_more');//学无止境加载更多
    Route::get('/Home/title_info', 'IndexController@title_info');//博客详情
    Route::get('/Home/moodlist_info', 'IndexController@moodlist_info');//所思所悟详情
    Route::post('/Home/praise', 'IndexController@praise');//点赞
});

Route::group(['namespace' => 'Admin'], function() {
    Route::get('/Admin/login', 'LoginController@login');
    Route::get('/Admin/captcha', 'LoginController@captcha');
    Route::post('/Admin/validator', 'LoginController@validator');
    Route::get('/Admin/login_out', 'LoginController@login_out');
});

Route::group(['namespace' => 'Admin','middleware' => 'check'], function() {
    Route::get('/Admin/index', 'IndexController@index');

    Route::get('/Admin/write', 'PersonalCenterController@write');//写文章页面
    Route::post('/Admin/upload_img','PersonalCenterController@upload_img');
    Route::post('/Admin/add_write', 'PersonalCenterController@add_write');//添加文章操作
    Route::post('/Admin/save_articles', 'PersonalCenterController@save_articles');//修改文章阅读状态
    Route::get('/Admin/articles_info', 'PersonalCenterController@articles_info');//文章详情
    Route::get('/Admin/save_write', 'PersonalCenterController@save_write');//修改文章页面
    Route::post('/Admin/save_article', 'PersonalCenterController@save_article');//修改文章操作
    Route::get('/Admin/my_articles', 'PersonalCenterController@my_articles');//我的所有文章

//    个人中心
    Route::get('/Admin/edit_info', 'PersonalCenterController@edit_info');
    Route::post('/Admin/save_info', 'PersonalCenterController@save_info');
    Route::get('/Admin/edit_password', 'PersonalCenterController@edit_password');

//    我的资源
    Route::get('/Admin/my_resource', 'ResourceController@my_resource');
    Route::get('/Admin/update_resource', 'ResourceController@update_resource');
    Route::get('/Admin/rely', 'RelyController@rely');
    Route::post('/Admin/edit_password', 'PersonalCenterController@edit_password');

//    系统设置
    Route::get('/Admin/type_list', 'SystemController@type_list');
    Route::get('/Admin/setting', 'SystemController@setting');
    Route::post('/Admin/set', 'SystemController@set');
});