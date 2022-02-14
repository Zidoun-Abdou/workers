<?php

header('Content-type: application/json');
include_once ('Controllers/UsersController.php');
include_once ('models/User.php');
include_once ('database/DB.php');
$result["messageRetour"] = "Not found";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["password"])) {

    $newWorker = new UsersController();
    $newWorker->register();

    echo "succes !!";
}else{
    echo 'error !!';
}


