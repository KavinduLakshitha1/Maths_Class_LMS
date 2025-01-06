<?php
include "connection.php";
session_start();


$mobile = $_POST["mobile"];
$password = $_POST["password"];
$rememberme = $_POST["rememberme"];

if (empty($mobile)) {
    echo ("Please enter your Mobile number");
} else if (strlen($mobile) != 10) {
    echo ("Your mobile number should contain 10 digits.");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8,][0-9]{7}/", $mobile)) {
    echo ("Please enter valid mobile number");
} else if (empty($password)) {
    echo ("Please enter your password");
} else {
    $signinrs = Database::search("SELECT * FROM `user` WHERE `mobile`='$mobile' AND `password`='$password'");
    $signNum = $signinrs->num_rows;
    if ($signNum == 1) {

        $signindetails = $signinrs->fetch_assoc();

        $_SESSION["user"] = $signindetails;

        

        if ($rememberme == "true") {
            setcookie("mobile", $mobile, time() + (60 * 60 * 24 * 30));
            setcookie("password", $password, time() + (60 * 60 * 24 * 30));
        } else {
            setcookie("mobile", "", -1);
            setcookie("password", "", -1);
        }

        echo ("success");
    } else {
        echo ("Invalid login Details");
    }
}
