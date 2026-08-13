<?php

class Logout extends Controller
{


    public function logout()
    {
        session_start();
        session_destroy();
        $_SESSION = [];
        header('Location:' . base_url . '/Login');
    }

}
