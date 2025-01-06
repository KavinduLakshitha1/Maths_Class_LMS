<?php

session_start();
include "connection.php";

$email =  $_POST["email"];
$password = $_POST["password"];



if (empty($email)) {
    echo ("Please enter your email.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Please enter valid email.");
} else if (empty($password)) {
    echo ("Please enter your password.");
} else {
    $adminrs = Database::search("SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password'");
    $adminnum = $adminrs->num_rows;

    if ($adminnum == 1) {
        $admindata = $adminrs->fetch_assoc();
        $_SESSION["admin"] = $admindata;

        echo ("success");
    } else {
        echo ("User not found");
    }
}
