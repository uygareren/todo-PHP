<?php

if(get_session('login') && get_session('login') == true){
    redirect('/home');
}

if(route(0) == 'login'){
    
    
    if(isset($_POST["submit"])){
        $_SESSION['post'] = $_POST;
        $email = post("email");
        $password = post("password");

        $return = model("Auth/login", ["email" => $email, "password" => md5($password)], 'login');
        
        if($return['success'] == true){
            if($return['redirect']){
                redirect($return['redirect']);
            };

        }else{
            add_session("error", ['message' => $return['message'] ?? '', 'type' => $return['type'] ?? '']);

        }

    }

    view("/Auth/login");

}