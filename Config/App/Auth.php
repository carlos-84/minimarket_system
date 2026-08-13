<?php

class Auth
{
    /* 
   *
   * @void sesiones
   * 
   */
    public static function noAuth()
    {
        if (!isset($_SESSION['login'])) {
            header('Location:' . base_url . '/Login');
        }
    }

    public static function logout()
    {
        session_start();
        session_destroy();
        $_SESSION = [];
        header('Location:' . base_url . '/Login');
    }
}
