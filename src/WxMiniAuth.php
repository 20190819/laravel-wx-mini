<?php
/**
 * Created by phpstorm.
 * User: yangliang
 * Date: 2020/2/24 0024
 * Time: 14:19
 */


namespace Sczts\WxMini;

use Illuminate\Support\Facades\Cache;
use App\Models\WxUser;
use Exception;

class WxMiniAuth
{
    const CACHE_PREFIX = 'wx/mini:';
    const TOKEN_KEY = 'wxMiniToken';
    protected $cache_key;
    protected $auth_session;
    protected $wx_user;

    /**
     * WxMiniAuth constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $decrypted = $this->decryptToken(\request()->header(static::TOKEN_KEY));
        $this->cache_key = static::CACHE_PREFIX . $decrypted;
        $this->auth_session = Cache::get($this->cache_key);
    }

    public function id()
    {
        return $this->auth_session['id'];
    }

    public function openid()
    {
        return $this->auth_session['openid'];
    }

    public function user()
    {
        $this->wx_user = WxUser::query()->find($this->auth_session['id']);
        return $this->wx_user;
    }

    public function authSession()
    {
        return $this->auth_session;
    }

    public function cacheKey()
    {
        return $this->cache_key;
    }

    public function cachePrefix()
    {
        return static::CACHE_PREFIX;
    }

    public function tokenKey()
    {
        return static::TOKEN_KEY;
    }


    /**
     * @param $token
     * @return mixed|null
     * @throws Exception
     */
    public function decryptToken($token)
    {
        $decrypted = null;
        if ($token) {
            try {
                $decrypted = decrypt($token);
            } catch (Exception $e) {
                throw new Exception('token 无效');
            }
        }

        return $decrypted;
    }
}
