<?php

include "connection.php";

if(isset($_GET["id"])){

    $id = $_GET["id"];

    $video_rs = Database::search("SELECT * FROM `video` WHERE `id`='".$id."'");
    $video_num = $video_rs->num_rows;

    if($video_num == 1){

        $video_data = $video_rs->fetch_assoc();

        if($video_data["status_id"] == 1){
            Database::iud("UPDATE `video` SET `status_id`='2' WHERE `id`='".$id."'");
            echo ($video_data["title"]." Deactive.");
        }else if($video_data["status_id"] == 2){
            Database::iud("UPDATE `video` SET `status_id`='1' WHERE `id`='".$id."'");
            echo ($video_data["title"]." Active.");
        }

    }else{
        echo ("Cannot find the user. Please try again later.");
    }

}else{
    echo ("Something went wrong");
}

?>