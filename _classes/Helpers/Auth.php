<?php

namespace Bb\Blendingbites\Helpers;

class Auth
{
    
    static function check()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        } else return false;
    }
    static function needLogin()
    {
        if (!self::check()) {
            HTTP::redirect("/login.php");
        }
    }
}
