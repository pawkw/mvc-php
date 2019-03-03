<?php

// echo 'Index requested URL: '.$_GET['url'].'<br />';

function loader($class_name) {
    if(file_exists('./classes/'.$class_name.'.php')) {
        require_once './classes/'.$class_name.'.php';
    } else if (file_exists('./controllers/'.$class_name.'.php')) {
        require_once './controllers/'.$class_name.'.php';
    }
}

spl_autoload_register('loader');

if(isset($_POST['logout'])) {
    unset($_COOKIE['BKID']);
    unset($_POST['logout']);
    setcookie('BKID', null, 1, '/');
    // echo 'Logged out.';
    // die();
}

function userValidated() {
    if(isset($_COOKIE['BKID'])) {
        $userid = Database::query('SELECT user_id FROM login_tokens WHERE token=:token',
            array(':token'=>sha1($_COOKIE['BKID'])));
        if($userid) {
            return $userid[0]['user_id'];
        }
    }
    return false;
}
$user = userValidated();
if($user===false && $_GET['url']!='login' && $_GET['url']!='create-account') {
    header("location: login");
    exit();
}

require_once('Routes.php');

// require_once 'css/style.css';
