<?php

namespace Sczts\Wxmini\Providers;

use Illuminate\Support\ServiceProvider;
use Sczts\WxMini\Commands\create\WxCtrl;
use Sczts\WxMini\Commands\create\WxMid;
use Sczts\WxMini\Commands\create\WxModel;
use Sczts\WxMini\WxMini;

class WxMiniProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //  单例绑定服务
        $this->app->singleton(WxMini::class, function ($app) {
            return new WxMini();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 注册扩展包迁移文件
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->publishes([
            // 配置文件
            realpath('../../config/wx_mini.php') => config_path('wx_mini.php'),
            // 迁移文件
            realpath('../migrations/create_wx_users_table.php') => database_path('migrations/create_wx_users_table.php')
        ]);

        // 注册扩展包的 Artisan 命令
        if ($this->app->runningInConsole()) {
            $this->commands([
                WxCtrl::class,
                WxModel::class,
                WxMid::class
            ]);
        }
    }

    public function provides()
    {
        return [WxMini::class];
    }
}
