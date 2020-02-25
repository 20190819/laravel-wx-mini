<?php

namespace Sczts\WxMini\Commands\create;

use Illuminate\Console\GeneratorCommand;

class WxCtrl extends GeneratorCommand
{
    protected $signature = 'create:wx_ctrl {name}';
    protected $description = '生成控制器';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/WxCtrl.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Controllers'; //直接写死
    }
}
