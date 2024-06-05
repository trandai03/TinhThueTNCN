<?php 
    require_once("config.php") ;
	require_once("database.php");
    require_once("model/tax.php");
    require_once("model/user.php");
    session_start();
?>
<?php
	$view ="";
	$data = array();
	$message ="";
    $uri = [];
    
    $para = [];
    $controller = "tax";
    $action = "index";
    if(isset($_SERVER["PATH_INFO"])){

        $uri = explode("/",$_SERVER["PATH_INFO"]);
        $uri = array_diff($uri,[""]);
    }

    switch (count($uri)){
        case 0: break;
        case 1: $controller = $uri[1]; break;
        case 2: $controller = $uri[1]; $action = $uri[2]; break;
        default: $controller = $uri[1]; $action = $uri[2]; 
                $para = array_slice($uri,2,count($uri)-2); break;
    }
   

    include "controller/".$controller.".php";
    $controller = $controller."Controller";
    $controller = new $controller();

    $action .= "_action";
  
    if(empty($para)){
        // [$view, $data] = $action();
        [$view, $data] = $controller->$action();
    }        
    else
        [$view, $data] = $controller->$action(...$para);
        // [$view, $data] = $action(...$para);
    include("views/view.php");
?>
