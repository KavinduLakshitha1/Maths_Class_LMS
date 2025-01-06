<?php

session_start();
include "connection.php";

if(isset($_SESSION["u"])){

    $order_id = $_POST["o"];  
    $mobile = $_SESSION["u"]["mobile"];
    $amount = $_POST["a"];
    



    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`total`,`user_mobile`) 
    VALUES ('".$order_id."','".$date."','".$amount."','".$mobile."')");

    echo ("success");

}

?>