<?php 
include "connection.php";

$pass = $_POST["p"];
$repass = $_POST["rtp"];
$vcode = $_POST["vcode"];
// echo($vcode);



if(empty($pass)){
    echo("Please enter your password");

}else if(empty($repass) || $pass != $repass){
    echo("Please confirm your password");
}elseif (empty($vcode)){
    echo("Something went wrong. please resend a forgot password email ");
}else{

    $rs = Database::search("SELECT * FROM `admin` WHERE `vcode`='$vcode'");
    $num = $rs->num_rows;
    if($num==1){
        $data = $rs->fetch_assoc();

        Database::iud("UPDATE `admin` SET `password`='$pass' ,`vcode`=NULL WHERE `email`='".$data["email"]."'") ;
        echo("success");
        
    }else{
        echo ("User not found");
    }

}



?>