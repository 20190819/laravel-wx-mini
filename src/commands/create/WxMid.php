<?php

namespace Sczts\WxMini\Commands\create;

use Illuminate\Console\GeneratorCommand;

class WxMid extends GeneratorCommand
{
    protected $signature = 'create:wx_mid {name}';
    protected $description = '生成中间件';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/WxMid.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Middleware';
    }
}
