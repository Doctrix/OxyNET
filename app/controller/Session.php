<?php

namespace Controller;

class Session {

    static $instance;

    public function __construct()
    {
        session_start();
    }

    static function getInstance()
    {
        if(self::$instance){
            self::$instance = new Session();
        }
        return self::$instance;
    }
    
    function getFlash() 
    {
        if(isset($_SESSION['Flash'])){
            extract($_SESSION['Flash']);
            unset($_SESSION['Flash']);
            return "<div class='alert alert-$type'>$message</div>";
        }
    }
    
    function setSuccess($message, $type = 'success')
    {
        $_SESSION['Flash']['message'] = $message;
        $_SESSION['Flash']['type'] = $type;
    }
    
    function setErreur($message, $type = 'danger')
    {
        $_SESSION['Flash']['message'] = $message;
        $_SESSION['Flash']['type'] = $type;
    }

    public function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function read($key)
    {
        return isset( $_SESSION[$key]) ?  $_SESSION[$key] : null;
    }

    public function delete($key,$value)
    {
        # code...
    }
}
