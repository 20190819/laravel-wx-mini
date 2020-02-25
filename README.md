# 快速开始
1. 使用 composer 安装
```bash
composer require sczts/sms
```
2. 发布配置文件
```bash
php artisan vendor:publish  --tag=wx_init
```
3. 运行命令
``` bash
php artisan migrate                       # 数据迁移
php artisan create:wx_ctrl WxController   # 生成控制器
php artisan create:wx_model WxUser        # 生成模型
php artisan create:wx_mid WxAuth          # 生成中间件
```
4. 向.env文件添加配置
```bash
# 小程序
MINIPROGRAM_APPID=
MINIPROGRAM_SECRET=
```
5. 为路由分配中间件
```bash
# app/Http/Kernel.php

protected $routeMiddleware = [
         'wx_auth' => \App\Http\Middleware\WxAuth::class,
]
```

# 使用
1. 扩展包自带路由-后端接口服务
``` bash
Route::post('api/wx/login', 'App\Http\Controllers\WxController@login');  //  登陆

Route::group(['prefix' => 'api/wx', 'middleware' => 'wx_auth', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('logout', 'WxController@logout'); //  小程序-退出
    Route::post('phone_num', 'WxController@getPhoneNum');  //  获取手机号
    Route::get('token/refresh', 'WxController@refreshToken');  //  刷新token
});
```