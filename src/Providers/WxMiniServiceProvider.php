<?php

namespace Sczts\WxMini\Providers;

use Illuminate\Support\ServiceProvider;
use Sczts\WxMini\Commands\create\WxCtrl;
use Sczts\WxMini\Commands\create\WxMid;
use Sczts\WxMini\Commands\create\WxModel;
use Sczts\WxMini\WxMini;

class WxMiniServiceProvider extends ServiceProvider
{
    protected $defer = true;

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
        $this->publishes([
            // 配置文件
            realpath(__DIR__ . '/../../config/wx_mini.php') => config_path('wx_mini.php'),
            // 迁移文件
            realpath(__DIR__ . '/../migrations/2020_02_25_021629_create_wx_users_table.php') => database_path('migrations/2020_02_25_021629_create_wx_users_table.php')
        ], 'init');

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
