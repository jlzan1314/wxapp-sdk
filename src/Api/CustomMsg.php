<?php
/**
 * Created by PhpStorm.
 * User: Jlzan1314
 * Date: 2017/7/29
 * Time: 21:18
 */

namespace Jlzan1314\WxApp\Api;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * @package Jlzan1314\WxApp\Api
 * @Bean(scope=Bean::PROTOTYPE)
 */
class CustomMsg extends BaseApi
{
	public function send($touser,$msgtype,$content_array){
		$url = ApiUrl::CUSTOM_MSG_SEND;
		$param = array(
			'touser'=>$touser,
			'msgtype'=>$msgtype,
			$msgtype=>$content_array,
		);
		return $this->sendRequestWithToken($url,$param);
	}

}