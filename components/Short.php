<?php
namespace components;

class Short {

    var $source;
    var $api;

    public function init()
    {
        parent::init();

        if ($this->source === null) {
            throw new InvalidConfigException('The "account_sid" property must be set.');
        }
        if ($this->api === null) {
            throw new InvalidConfigException('The "auth_token" property must be set.');
        }
    }

    function send($url) {

        // 请求url
        $request_url = sprintf($this->api.'?source=%s&url_long=%s', $this->source, $url);
        $result = array();

        // 执行请求
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        $data = curl_exec($ch);
        if($error=curl_errno($ch)){
            return false;
        }

        if ($data) {

            curl_close($ch);
            $result = json_decode($data, true);
            return $result;

        } else {

            $error = curl_errno($ch);
            curl_close($ch);
            return false;

        }
    }
}
