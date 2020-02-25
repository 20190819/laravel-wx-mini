<?php

namespace Sczts\WxMini\Commands\create;

use Illuminate\Console\GeneratorCommand;

class WxModel extends GeneratorCommand
{
    protected $signature = 'create:wx_model {name}';
    protected $description = '生成 模型';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/WxUser.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Models'; //直接写死
    }

}
