<?php

include "connection.php";

if(isset($_GET["id"])){

    $id = $_GET["id"];

    $user_rs = Database::search("SELECT * FROM `resources` WHERE `id`='".$id."'");
    $user_num = $user_rs->num_rows;

    if($user_num == 1){

        $user_data = $user_rs->fetch_assoc();

        if($user_data["status_id"] == 1){
            Database::iud("UPDATE `resources` SET `status_id`='2' WHERE `id`='".$id."'");
            echo ($user_data["title"]." Deactive");
        }else if($user_data["status_id"] == 2){
            Database::iud("UPDATE `resources` SET `status_id`='1' WHERE `id`='".$id."'");
            echo ($user_data["title"]." Active");
        }

    }else{
        echo ("Cannot find the resource. Please try again.");
    }

}else{
    echo ("Something went wrong");
}

?>