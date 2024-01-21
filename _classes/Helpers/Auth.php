<?php
namespace Helpers;
use Helpers\HTTP;

class Auth
{
    static $loginUrl = 'login.php';

    static function check()
    {
      /*   if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['loggedin'])) {
            return $_SESSION['loggedInUser'];
        } else {
            HTTP::redirect(static::$loginUrl,"Login First");
        } */
    }
}