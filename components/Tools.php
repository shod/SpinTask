<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 *
 * @author Schemelev E.
 */
class Tools {

    public static function curl($url) {
        
        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );

        $res = curl_exec( $ch );
        if($res === false)
        {
            return 'Ошибка curl: ' . curl_error($ch);
        }
        curl_close( $ch );
        
        return $res;
    }
}
