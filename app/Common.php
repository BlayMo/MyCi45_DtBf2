<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */
if (!function_exists('myhtml_entity_decode')) {

//eliminar el error al pasar un string nulo 
    function myhtml_entity_decode($string, $flag, $utf) {
        $ret = '';
        if ($string != '') {
            $ret = html_entity_decode($string, $flag, $utf);
        }

        return $ret;
    }

}

if (!function_exists('numero')) {
//formatea un numero estilo español  \number_format($importe, 2, ',', '.')
    function numero($numero) {
        $n = redondea(($numero * 1));       
        return \number_format($n, 2, ',', '.');
    }
}

if (!function_exists('redondea')) {
    function redondea($float) {       
        return round(($float * 1), 2, PHP_ROUND_HALF_EVEN);
    }   
}

if (!function_exists('numero_es')) {

//formatea un numero estilo español  \number_format($importe, 2, ',', '.')
    function numero_es($numero) {
        $n = round(($numero * 1), 2, PHP_ROUND_HALF_EVEN);
        
        if ($n >=0 ){
            $ret =  '<span style="color:blue">'.\number_format($n, 2, ',', '.').'</span>';
        }
        if ($n < 0 ){
            $ret =  '<span style="color:red">'.\number_format($n, 2, ',', '.').'</span>';
        }
        return $ret;
    }

}

if (!function_exists('fecha')) {
    
    function fecha($sdate){
        
        return date('d-m-Y H:i:s', \strtotime($sdate));
        
    }
    
}