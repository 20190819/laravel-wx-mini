<?php
/**
 * Created by phpstorm.
 * User: yangliang
 * Date: 2020/2/24 0024
 * Time: 16:55
 */

Route::post('api/wx/login', 'App\Http\Controllers\WxController@login');  //  登陆

Route::group(['prefix' => 'api/wx', 'middleware' => 'wx_auth', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('logout', 'WxController@logout'); //  小程序-退出
    Route::post('phone_num', 'WxController@getPhoneNum');  //  获取手机号
    Route::get('token/refresh', 'WxController@refreshToken');  //  刷新token
});

