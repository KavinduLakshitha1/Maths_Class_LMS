<?php

include "connection.php";

$id = $_GET["id"];
echo $id;

if(isset($id)){
   
    Database::iud("DELETE  FROM `checkout` WHERE `id`='$id'");
    echo "success";
} else {
    echo "Something went wrong";
}
?>
