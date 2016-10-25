<?php

class auth {
    function index(){
        return $this;
    }
    
    function access($utypes=array()){
        $url=module('url');
        @session_start();
        if(in_array(@$_SESSION['logged_in']['type'],$utypes)){
            
        }
        else{
            $url->redirect('login');
        }
    }
    
}
