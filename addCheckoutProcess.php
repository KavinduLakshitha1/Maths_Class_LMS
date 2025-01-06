<?php
include "connection.php";

$subject = $_POST["subject"];
$teacher = $_POST["teacher"];
$month = $_POST["month"];
$mobile = $_POST["mobile"];

if (empty($subject)) {
    echo ("Please select subject.");
} elseif (empty($teacher)) {
    echo ("Please select teacher.");
} else {

 

    $payclassrs =  Database::search("SELECT * FROM `class` WHERE `subject_id`='$subject' AND `user_mobile`='$teacher'");
    $payclassnum = $payclassrs->num_rows;

    if ($payclassnum == 1) {
        $payclassdata = $payclassrs->fetch_assoc();

        Database::iud("INSERT INTO `checkout` (`class_id`, `month`,`user_mobile`) VALUES ('".$payclassdata["id"]."', '$month','$mobile')");
        echo "success";

    }else{
        echo ("Class not found");
    }

}
