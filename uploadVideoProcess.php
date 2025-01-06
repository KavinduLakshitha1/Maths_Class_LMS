<?php
session_start();
include "connection.php";

$subject = $_POST["subject"];
$teacher = $_POST["teacher"];
$title = $_POST["title"];
$desc = $_POST["description"];

if (empty($subject)) {
    echo ("Please select subject.");
} elseif (empty($teacher)) {
    echo ("Please select teacher.");
} elseif (empty($title)) {
    echo ("Please enter title.");
} elseif (empty($desc)) {
    echo ("Please enter description.");
} else {

    $thumbnail = $_FILES["thumbnail"];
    $video = $_FILES["video"];

    if (isset($thumbnail) && isset($video) ) {

        $thumbnail_extention = $thumbnail["type"];
        $allowed_thumbnail_extention = array("image/jpeg", "image/png", "image/svg+xml");

        if (in_array($thumbnail_extention, $allowed_thumbnail_extention)) {
            $new_extention;

            if ($thumbnail_extention == "image/jpeg") {
                $new_extention = ".jpeg";
            } elseif ($thumbnail_extention == "image/png") {
                $new_extention == ".png";
            } elseif ($thumbnail_extention == "image/svg+xml") {
                $new_extention == ".svg";
            }

            $thumbnail_name = "images//thumbnails//" . $title . "_" . uniqid() . $new_extention;

            move_uploaded_file($thumbnail["tmp_name"], $thumbnail_name);
        }



        $video_extention = $video["type"];
        $allowed_video_extention = array("video/mp4", "video/webm", "video/ogg");

        if (in_array($video_extention, $allowed_video_extention)) {
            $new_video_extention;

            if ($video_extention == "video/mp4") {
                $new_video_extention = ".mp4";
            } elseif ($video_extention == "video/webm") {
                $new_video_extention == ".webm";
            } elseif ($video_extention == "video/ogg") {
                $new_video_extention == ".ogg";
            }

            $video_name = "videos//recordings//" . $title . "_" . uniqid() . $new_video_extention;

            move_uploaded_file($video["tmp_name"], $video_name);


            $date = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $date->setTimezone($tz);
            $uploaddate = $date->format("Y-m-d H:i:s");

            Database::iud("INSERT INTO `video`(`url`,`uploaded_date`,`title`,`description`,`thumbnail`,`status_id`,`user_mobile`,`subject_id`) VALUES('$video_name','$uploaddate','$title','$desc','$thumbnail_name','1','$teacher','$subject')");
            echo ("Success");
        }
    } else {
        echo ("Please choose your video and thumbnail.");
    }
    
}
