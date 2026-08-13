<?php

class Logout extends Controller
{


    public function logout()
    {
        Auth::logout();
    }

}
