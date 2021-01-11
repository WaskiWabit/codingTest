<?php

namespace App\Helpers;

class IpAddress
{
    /**
     * @param $ip_address
     * @return string
     */
    public static function getHemisphereFromIpAddress($ip_address)
    {
        //return 'southern';
        return 'northern';
    }
}
