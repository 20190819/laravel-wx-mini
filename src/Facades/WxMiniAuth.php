<?php
/**
 * Created by phpstorm.
 * User: yangliang
 * Date: 2020/2/24 0024
 * Time: 14:35
 */


namespace Sczts\WxMini\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class WxMiniAuth
 * @package Sczts\WxMini\Facades
 * @method static mixed cachePrefix()
 * @method static mixed tokenKey()
 * @method static mixed id()
 * @method static mixed openid()
 * @method static mixed user()
 * @method static mixed authSession()
 * @method static mixed cacheKey()
 * @method static mixed decryptToken($token)
 * @see \Sczts\WxMini\WxMiniAuth
 */
class WxMiniAuth extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sczts\WxMini\WxMiniAuth::class;
    }
}
