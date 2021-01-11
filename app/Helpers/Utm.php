<?php
namespace App\Helpers;

class Utm
{
    /**
     * @param $utm
     * @return bool
     */
    public static function validateUtm($utm)
    {
        $utm = strtolower($utm);
        $accepted = ['youtube', 'fb'];

        if(in_array($utm, $accepted))
        {
            return true;
        }

        return false;
    }
}
