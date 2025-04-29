class GiftDo extends Ethna_ActionClass
{
    function perform()
    {
        $fid = $this->af->get('fid');
        $giftcode = $this->af->get('giftcode');

        $url = "https://wos-giftcode-api.centurygame.com/api/gift_code";

        $time = time();
        $secret = "tB87#kPtkxqOS2";
        $params = [
            "fid" => $fid,
            "cdk" => $giftcode,
            "time" => $time
        ];

        ksort($params);
        $encoded = http_build_query($params);
        $sign = md5($encoded . $secret);

        $params["sign"] = $sign;

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n" .
                             "Origin: https://wos-giftcode.centurygame.com\r\n",
                'content' => http_build_query($params),
            ],
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $result = json_decode($response, true);

        $this->af->setApp('result', $result);
        return 'gift_result';
    }
}
