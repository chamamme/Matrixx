<?php
/**
 * Created by PhpStorm.
 * User: Andrew Chamamme
 * Date: 1/16/2018
 * Time: 4:31 PM
 */

namespace App\Core;


class Response
{

    private static  $status_code;
    private static  $content_type = "application/json";
    private static  $allowed = ['*'];
//    private $content_type = "application/json";

    /**
     *
     */
    private function set_header(){
        $code       = self::$status_code;
        $message    = self::status_message(self::$status_code);
        $type       = self::$content_type;
        $allowed    = self::$allowed;

        header('Access-Control-Allow-Origin:'.implode(',',$allowed ));
        header("HTTP/1.1 {$code} {$message}" );
        header("Content-Type:{$type}");
    }



    public static function output($data,$status_code){

        self::$status_code = ($status_code) ? $status_code : 200;

        self::set_header();

        $final =['data'=>$data,'status'=>$status_code];

        echo  json_encode($final);

        return  ;

    }


    /**
     * @param $code
     * @return mixed
     */
    private function status_message($code){
        $status = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported');
        return (empty($status[$code]))?$status[500]:$status[$code];
    }
}