<?php

namespace Bb\Blendingbites\Helpers;

class Auth
{

    static function check()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        } else return false;
    }
    static function needLogin()
    {
        if (!self::check()) {
            HTTP::redirect("/pages/auth/login.php");
        }
    }
    static function requireAdminAccess()
    {
        if (self::check() && $_SESSION['user']->value == 2) {
            // yo! vibe check passed
        } else {
            HTTP::redirect("/pages/error/401.php");
        }
    }
    static function checkIfAdmin()
    {
        if (self::check()) {
            HTTP::redirect("/login.php");
        }
    }
}
