<?php

function getLogo($src) {

    $src = $src == '' ? 'http://placehold.it/150x150' : '/images/uploads/' . $src;

    return '<img src="'.$src.'" class="img-thumbnail" width="150" />';

}

function hoursRange( $lower = 0, $upper = 86400, $step = 3600, $format = '' ) {
  
    $times = array();

    if ( empty( $format ) ) {
        $format = 'g:i a';
    }

    foreach ( range( $lower, $upper, $step ) as $increment ) {
        $increment = gmdate( 'H:i', $increment );

        list( $hour, $minutes ) = explode( ':', $increment );

        $date = new DateTime( $hour . ':' . $minutes );

        $times[(string) $increment] = $date->format( $format );
    }

    return $times;
}

function getClientIp() {

    $ip = getenv('HTTP_CLIENT_IP')?:
    getenv('HTTP_X_FORWARDED_FOR')?:
    getenv('HTTP_X_FORWARDED')?:
    getenv('HTTP_FORWARDED_FOR')?:
    getenv('HTTP_FORWARDED')?:
    getenv('REMOTE_ADDR');

    return $ip;
}

function getClientCountry($ip) {
    try {
        return file_get_contents("http://ipinfo.io/{$ip}/country");
    } catch (Exception $e) {
        
    }
    
}