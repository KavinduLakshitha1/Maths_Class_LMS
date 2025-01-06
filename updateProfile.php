<?php

include "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$nic = $_POST["nic"];
// $password = $_POST["password"];
// $gender = $_POST["gender"];

if (empty($fname)) {
    echo ("Please enter your first name");
} else if (empty($lname)) {
    echo ("Please enter your last name");
}  else if (empty($email)) {
    echo ("Please enter your email address");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Please enter valid email address");
} else if (empty($nic)) {
    echo ("Please enter your NIC number");
} else {
    $user = Database::search("SELECT * FROM `user` WHERE `mobile`='$mobile' ");
    $userCount = $user->num_rows;

    if ($userCount == 1) {
        Database::iud("UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`nic`='$nic',`email`='$email' WHERE `mobile`='$mobile'");
        echo("success");
    } else {
        // Database::iud("INSERT INTO `user`(`mobile`,`first_name`,`last_name`,`nic`,`email`,`password`,`gender_id`,`user_type_id`,`status_id`) VALUES ('$mobile','$fname','$lname','$nic','$email','$password','$gender','3','1')");
        echo("user nor found");
    }
}




?>