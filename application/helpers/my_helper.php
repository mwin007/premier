<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('die_r') ){

    function die_r($input){

        echo '<pre>';
        print_r($input);
        die;
    }
}

if ( ! function_exists('make_hash') ){

    function make_hash($pwd){
        $password=sha1('$$premier$'.$pwd.'$premier$$');;

        return $password;

    }
}

if ( ! function_exists('filter_xss') ){

    function filter_xss($str){

        $str=trim(xss_clean($str));

        return $str;
    }

}
