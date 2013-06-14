<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Quantum
 *
 * A modular application starter kit built with CodeIgniter
 *
 * @package     Quantum
 * @author      Matt Lantz
 * @copyright   Copyright (c) 2013 Matt Lantz
 * @license     http://ottacon.co/quantum/license
 * @link        http://ottacon.co/quantum
 * @since       Version 1.0
 * 
 */

class mobile {
    
    public function mobile(){
    
        function isMobile(){
            $CI =& get_instance();

            $isMobile = false;

            $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
            $ac = strtolower($_SERVER['HTTP_ACCEPT']);
           
            $isMobile = strpos($ua, 'mobile') !== false 
                    || strpos($ua, 'sony') !== false
                    || strpos($ua, 'symbian') !== false
                    || strpos($ua, 'android') !== false 
                    || strpos($ua, 'nokia') !== false 
                    || strpos($ua, 'samsung') !== false 
                    || strpos($ua, 'iphone') !== false
                    || strpos($ua, 'ios') !== false
                    || strpos($ua, 'ipod') !== false
                    || strpos($ua, 'windows ce') !== false
                    || strpos($ua, 'epoc') !== false
                    || strpos($ua, 'nitro') !== false
                    || strpos($ua, 'j2me') !== false
                    || strpos($ua, 'midp-') !== false
                    || strpos($ua, 'cldc-') !== false
                    || strpos($ua, 'netfront') !== false
                    || strpos($ua, 'mot') !== false
                    || strpos($ua, 'up.browser') !== false
                    || strpos($ua, 'up.link') !== false
                    || strpos($ua, 'audiovox') !== false
                    || strpos($ua, 'blackberry') !== false
                    || strpos($ua, 'ericsson,') !== false
                    || strpos($ua, 'panasonic') !== false
                    || strpos($ua, 'philips') !== false
                    || strpos($ua, 'sanyo') !== false
                    || strpos($ua, 'sharp') !== false
                    || strpos($ua, 'sie-') !== false
                    || strpos($ua, 'portalmmm') !== false
                    || strpos($ua, 'blazer') !== false
                    || strpos($ua, 'avantgo') !== false
                    || strpos($ua, 'danger') !== false
                    || strpos($ua, 'palm') !== false
                    || strpos($ua, 'series60') !== false
                    || strpos($ua, 'palmsource') !== false
                    || strpos($ua, 'pocketpc') !== false
                    || strpos($ua, 'smartphone') !== false
                    || strpos($ua, 'rover') !== false
                    || strpos($ua, 'ipaq') !== false
                    || strpos($ua, 'au-mic,') !== false
                    || strpos($ua, 'alcatel') !== false
                    || strpos($ua, 'ericy') !== false
                    || strpos($ua, 'up.link') !== false
                    || strpos($ua, 'vodafone/') !== false
                    || strpos($ua, 'wap1.') !== false
                    || strpos($ua, 'wap2.') !== false;

            if($isMobile){
               return true;
            }else{
                return false;
            }
        }
    }
}
//End of File
?>