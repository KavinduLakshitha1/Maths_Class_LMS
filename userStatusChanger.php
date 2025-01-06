<?php

include "connection.php";

if(isset($_GET["mobile"])){

    $mobile = $_GET["mobile"];

    $user_rs = Database::search("SELECT * FROM `user` WHERE `mobile`='".$mobile."'");
    $user_num = $user_rs->num_rows;

    if($user_num == 1){

        $user_data = $user_rs->fetch_assoc();

        if($user_data["user_status_id"] == 1){
            Database::iud("UPDATE `user` SET `user_status_id`='2' WHERE `mobile`='".$mobile."'");
            echo ($user_data["first_name"]." ".$user_data["last_name"]." Active.");
        }else if($user_data["user_status_id"] == 2){
            Database::iud("UPDATE `user` SET `user_status_id`='1' WHERE `mobile`='".$mobile."'");
            echo ($user_data["first_name"]." ".$user_data["last_name"]." Deactive.");
        }

    }else{
        echo ("Cannot find the user. Please try again later.");
    }

}else{
    echo ("Something went wrong");
}

?>