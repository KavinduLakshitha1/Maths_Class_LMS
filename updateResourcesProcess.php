<?php
include "connection.php";

$id = $_POST["id"];
$title = $_POST["title"];
$desc = $_POST["desc"];

if (empty($title)) {
    echo ("Please enter your title");
} elseif (empty($desc)) {
    echo ("Please enter your description");
} else {

    Database::iud("UPDATE `resources` SET `title`='$title' , `description`='$desc' WHERE `id`='$id'");
    echo("success");

}
