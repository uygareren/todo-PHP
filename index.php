<?php

session_start();

require __DIR__."/config/config.php";


// glob() işlevi, belirtilen desene uyan dosya veya dizinleri içeren bir diziyi döndürür.
foreach (glob(BASEDIR."/helpers/*.php") as $file) {  
    require $file;
}



// default olarak route ve lang param'ı bunları işaret etsin.
$config["route"][0] = "home";
$config["lang"] = "tr";

if(isset($_GET['route'])){
    preg_match('@(?<lang>\b[a-z]{2}\b)?/?(?<route>.+)/?@',$_GET['route'],$result);
}

if(isset($result["lang"])){
    if(file_exists(BASEDIR.'/language/'.$result["lang"]. '.php')){
        $config["lang"]=$result["lang"];
    }else{
        $config["lang"]="tr";
        
    }

    require BASEDIR. "/language/". $config["lang"]. ".php";
}


if(isset($result["route"])){
    $config["route"] = explode("/", $result["route"]);
}


if(file_exists(BASEDIR. "/Controller/". $config["route"][0]. ".php")){
    require BASEDIR. "/Controller/". $config["route"][0]. ".php";
}else{
    echo "Sayfa Bulunamadı!";
}









