<?php

class Error404 extends Controller{

    

    public function error404()
    {
        
        $this->views->getView($this, "error404");
    }

}