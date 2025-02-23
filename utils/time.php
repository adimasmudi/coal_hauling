<?php

namespace App\utils;

use DateTime;
use DateTimeZone;

class Time
{
    public function formatTime($time){
        $datetime = new DateTime($time, new DateTimeZone( "Asia/Jakarta" ) );
        return $datetime->format( 'Y-m-d H:i:s' );
    }
}