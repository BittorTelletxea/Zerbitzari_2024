<?php

require_once "db.php";
require_once "/Controller/FutController.php";


if(isset($_POST["bidali"])){

    $futController = new FutController();

    if(!empty($_POST["izena"])){
        $futController->insert($_POST["izena"]);

    }
$futbolistak = $futController->show();

if(empty($futbolistak)){
    include "view/form";
}else{
    include "view/list";
}

}


