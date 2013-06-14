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

class json_lib {

    public function json_lib(){
        
        if (!function_exists('json_decode')) {
            function json_decode($content, $assoc=false) {
                require_once './hacks/JSON/JSON.php';
                if ($assoc) {
                    $json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
                }
                else {
                    $json = new Services_JSON;
                }
                return $json->decode($content);
            }
        }

        if (!function_exists('json_encode')) {
            function json_encode($content) {
                require_once './hacks/JSON/JSON.php';
                $json = new Services_JSON;
                return $json->encode($content);
            }
        }

    }

}
//End of File
?>