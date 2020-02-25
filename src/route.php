<?php
/**
 * Created by phpstorm.
 * User: yangliang
 * Date: 2020/2/24 0024
 * Time: 16:55
 */

Route::post('wx/login', 'WxController@login');  //  登陆

Route::group(['prefix' => 'wx', 'middleware' => 'wx_auth'], function () {
    Route::get('wx/logout', 'WxController@logout'); //  小程序-退出
    Route::post('wx/phone_num', 'WxController@getPhoneNum');  //  获取手机号
    Route::get('wx/token/refresh', 'WxController@refreshToken');  //  刷新token
});

