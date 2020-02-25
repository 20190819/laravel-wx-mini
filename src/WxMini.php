<?php
/**
 * Created by phpstorm.
 * User: yangliang
 * Date: 2020/2/24 0024
 * Time: 11:15
 */


namespace Sczts\WxMini;

use EasyWeChat\Factory;
use Illuminate\Support\Facades\Request;

class WxMini
{
    private $wx_mini;

    public function __construct()
    {
        $config = config('wx_mini');
        $this->wx_mini = Factory::miniProgram($config);
    }

    /**
     * 获取微信用户信息
     * @param $code
     * @param $encryptedData
     * @param $iv
     * @return array
     * @throws \EasyWeChat\Kernel\Exceptions\DecryptException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function userInfo($code, $encryptedData, $iv): array
    {
        // 根据code 获取openid session_key
        $auth_session = $this->wx_mini->auth->session($code ?? '');
        if (isset($auth_session['errcode'])) {
            throw new \Exception('"openid" && "session_key" 获取失败');
        }

        // 消息解密
        $decryptedData = $this->wx_mini->encryptor->decryptData($auth_session['session_key'], $iv, $encryptedData);

        return [
            'openid' => $decryptedData['openId'],
            'head_image' => $decryptedData['avatarUrl'],
            'nickname' => $decryptedData['nickName'],
            'country' => $decryptedData['country'],
            'province' => $decryptedData['province'],
            'city' => $decryptedData['city'],
            'gender' => $decryptedData['gender'],
            'language' => $decryptedData['language'],
            'session_key' => $auth_session['session_key']
        ];

    }

    /**
     * @param $session_key
     * @param $iv
     * @param $encryptedData
     * @return array
     * @throws \EasyWeChat\Kernel\Exceptions\DecryptException
     */
    public function phoneInfo($session_key, $iv, $encryptedData): array
    {
        //  消息解密 手机号
        $decryptedData = $this->wx_mini->encryptor->decryptData($session_key, $iv, $encryptedData);

        return $decryptedData;

    }

}
