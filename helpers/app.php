<?php



function route($index){
    global $config;

    if(isset($config['route'][$index])){
        return $config['route'][$index];
    }else{
        false;
    }
}

function view($viewName, $pageData = []) {
    $data = $pageData; // Add the semicolon at the end of this line

    if (file_exists(BASEDIR."/View/".$viewName.".php")) {
        require BASEDIR."/View/".$viewName.".php";
    } else {
        return false;
    }
}

function assets($assetName) {

    if (file_exists(BASEDIR."/public/".$assetName)) {
        return URL."/public/".$assetName;
    } else {
        return false;
    }
}


function lang($text) {

    global $lang;

    if (isset($lang[$text])) {
        return $lang[$text];
    } else {
        return false;
    }
}

function add_session($index,$value){
    $_SESSION[$index] = $value;
}
function get_session($index){
    if (isset($_SESSION[$index])) return $_SESSION[$index];
    else return false;
}

function post($index){
    if (isset($_POST[$index])) return $_POST[$index];
    else return false;
}
function get($index){
    if (isset($_GET[$index])) return $_GET[$index];
    else return false;
}
function get_cookie($index){
    if (isset($_COOKIE[$index])) return trim($_COOKIE[$index]);
    else return false;
}
