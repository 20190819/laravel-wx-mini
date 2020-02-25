<?php
/**
 * Created by phpstorm.
 * User: yangliang
 * Date: 2020/2/24 0024
 * Time: 14:12
 */


namespace Sczts\WxMini\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class WxMini
 * @package Sczts\WxMini\Facades
 * @method static array userInfo($code, $encryptedData, $iv)
 * @method static array phoneInfo($code, $encryptedData, $iv)
 * @see \Sczts\WxMini\WxMini
 */
class WxMini extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sczts\WxMini\WxMini::class;
    }
}
