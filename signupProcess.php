<?php
include "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$nic = $_POST["nic"];
$password = $_POST["password"];
$gender = $_POST["gender"];

if (empty($fname)) {
    echo ("Please enter your first name");
} else if (empty($lname)) {
    echo ("Please enter your last name");
} else if (empty($mobile)) {
    echo ("Please enter your mobile number");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8,][0-9]{7}/", $mobile)) {
    echo ("Please enter valid mobile number");
} else if (strlen($mobile) != 10) {
    echo ("Mobile number should contain 10 characters");
} else if (empty($email)) {
    echo ("Please enter your email address");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Please enter valid email address");
} else if (empty($nic)) {
    echo ("Please enter your NIC number");
}else if (empty($password)) {
    echo ("Please enter your password ");
} else if (strlen($password < 5 || strlen($password) > 20)) {
    echo ("Your password must contain 5-20 characters");
}  else if (empty($gender)) {
    echo ("Please select your gender");
} else {
    $user = Database::search("SELECT * FROM `user` WHERE `mobile`='$mobile' ");
    $userCount = $user->num_rows;

    if ($userCount == 1) {
        echo ("This user already exist. Please sign in or use another mobile to sign up");
    } else {
        Database::iud("INSERT INTO `user`(`mobile`,`first_name`,`last_name`,`nic`,`email`,`password`,`gender_id`,`user_type_id`,`user_status_id`) VALUES ('$mobile','$fname','$lname','$nic','$email','$password','$gender','3','1')");
        echo("success");
    }
}
