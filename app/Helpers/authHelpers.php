<?php

namespace App\Helpers;

class authHelpers
{
    public static function logged_in()
    {
        return  session()->logged_in;
    }

    public static function getUsername()
    {
        return session()->username;
    }

    public static function getRole()
    {
        return session()->role;
    }

    public static function logout()
    {
        return session()->destroy();
    }
}
