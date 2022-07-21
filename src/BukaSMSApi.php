<?php

namespace MarkLesterMorta\BukaSMSApi;


class BukaSMSApi
{

    public static function sendSMS($numbers, $message)
    {
            $apiKey = config('buka-sms-api.BUKAS_SMS_API_KEY');
            $apiSecret = config('buka-sms-api.BUKAS_SMS_API_SECRET');
            $apiId = config('buka-sms-api.BUKAS_SMS_APP_ID');

            $url = "https://api.onbuka.com/v3/sendSms";

            $timeStamp = time();
            $sign = md5($apiKey.$apiSecret.$timeStamp);

            $headers = array('Content-Type:application/json;charset=UTF-8',"Sign:$sign","Timestamp:$timeStamp","Api-Key:$apiKey");


            $data = array(
                'appId'=>$apiId,
                'numbers'=>$numbers,
                'content'=>$message,
                'senderId'=>''
            );

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 600);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS , json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

            $output = curl_exec($ch);
            curl_close($ch);

            return $output;
    }

    public static function getBalance()
    {
        $apiKey = config('buka-sms-api.BUKAS_SMS_API_KEY');
        $apiSecret = config('buka-sms-api.BUKAS_SMS_API_SECRET');
        $apiId = config('buka-sms-api.BUKAS_SMS_APP_ID');

        $url = "https://api.onbuka.com/v3/getBalance";

        $timeStamp = time();
        $sign = md5($apiKey.$apiSecret.$timeStamp);

        $headers = array('Content-Type:application/json;charset=UTF-8',"Sign:$sign","Timestamp:$timeStamp","Api-Key:$apiKey");

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 600);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
