<?php

namespace App\Helper;

use App;

class WaveHelper 
{

    public function wave_payment($msisdn, $amount, $currency)
    {

        $result = shell_exec('curl https://vault.paysbuy.com/ -X POST -u '.$public_key.': -d "wallet_id='.$msisdn.'" -d "wallet_brand=WaveMoney"');

        $resultarr = json_decode($result, true);
        $token = $resultarr['object']['token']['id'];

        $url = 'https://payapi.paysbuy.com/payment/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                    "token=$token&amount=$amount&currency=$currency&invoice=go games&description=test charge");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$private_key:");
        $result = curl_exec($ch);
        curl_close($ch); 
        return $result;
    }

    public function country($msisdn)
    {
        $geoCoder = \libphonenumber\geocoding\PhoneNumberOfflineGeocoder::getInstance();
        $gbNumber = \libphonenumber\PhoneNumberUtil::getInstance()->parse($msisdn, null);
        $country=$geoCoder->getDescriptionForNumber($gbNumber, 'en_GB', 'US');
        return $country;
    }

    public function operator($msisdn,$country_id)
    {
        $carrierMapper = \libphonenumber\PhoneNumberToCarrierMapper::getInstance();
        $chNumber = \libphonenumber\PhoneNumberUtil::getInstance()->parse($msisdn, null);
        $operator_name=$carrierMapper->getNameForNumber($chNumber, 'en');
        return $operator_name;
    }

    public function transform_msisdn($mdn) {
        $msisdn = "+95" . $mdn;
        if ($mdn[0] == 0) {
            $msisdn = ltrim($mdn, '0');
            $msisdn = "+95" . $msisdn;
            return $msisdn;
        }

        return $mdn;
    }


}











