<?php

namespace Helpers;

ob_start();
session_start();
class HTTP
{
    static $base = "http://localhost/matmal/";
    static function redirect($path,$status, $query = "")
    {
       
        $_SESSION['status']=$status;
       
        $url = static::$base . $path;
        if ($query)
            $url .= "?$query";
        header("location: $url");
        exit();
    }
}