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
// 基础页面
Route::get('/', 'StaticPagesController@home') -> name('home');
Route::get('/help', 'StaticPagesController@help') -> name('help');
Route::get('/about', 'StaticPagesController@about') -> name('about');

/* 用户注册页面 */
Route::get('/signup', 'UsersController@create') -> name('signup');
/* resource方法 定义用户资源路由 */
Route::resource('users', 'UsersController');
//Route::get('/users/{user}/edit', 'UsersController@edit') -> name('users.edit'); //用户个人信息编辑  已经包含在 resource 路由方法内

/*用户登录 登出页面*/
Route::get('/login', 'SessionsController@create') -> name('login');     //显示登录页面
Route::post('/login', 'SessionsController@store') -> name('login');     //创建新会话（登录操作）
Route::delete('/logout', 'SessionsController@destroy') -> name('logout');   //销毁会话（退出登录）

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');  //注册账号时的激活令牌


/*密码重置功能，通过 ForgotPasswordController 和 ResetPasswordController 两个控制器执行动作实现
*/
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');        //显示重置密码的邮箱发送页面
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');      //邮箱发送重置链接

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');         //密码更新页面
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');           //执行密码更新操作


Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);        //定义微博资源路由，并只需要 创建和删除 路由

Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');     // 显示 我已关注的用户列表
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');        //显示 粉丝列表
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');       //关注用户 操作
Route::get('/users/folloers/{user}', 'FollowersController@destroy')->name('followers.destroy');     //取消 关注用户 操作