<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Quantum
 *
 * A simple application starter kit
 *
 * @package     Quantum
 * @author      Matt Lantz
 * @copyright   Copyright (c) 2013 Matt Lantz
 * @license     http://ottacon.co/quantum/license
 * @link        http://ottacon.co/quantum
 * @since       Version 1.0
 * 
 */

class cryptography {
    
    public function cryptography(){

        function url_base64_encode($str){
            return strtr(base64_encode($str),
                array(
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
            ));
        }
         
        function url_base64_decode($str){
            return base64_decode(strtr($str,
                array(
                    '.' => '+',
                    '-' => '=',
                    '~' => '/'
            )));
        }

        function encrypt($string){
            $CI =& get_instance();
            $config_key = $CI->config->item('encryption_key');
            $iv = md5(md5($config_key));
            $encrypted = rawurlencode(url_base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($config_key), $string, MCRYPT_MODE_CBC, $iv)));
            return trim($encrypted); 
        }
        
        function decrypt($string){
            $CI =& get_instance();
            $config_key = $CI->config->item('encryption_key');
            $iv = md5(md5($config_key));
            $decrypted =  mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($config_key), url_base64_decode(rawurldecode($string)), MCRYPT_MODE_CBC, $iv);
            return trim($decrypted);
        }
    }

}
//End of File
?>