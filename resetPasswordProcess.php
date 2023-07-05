<?php

require "connection.php";

$email = $_POST["email"];
$new_pw = $_POST["new_pw"];
$retype_pw = $_POST["retype_pw"];
$verification_code = $_POST["verification_code"];

if(empty($email)){
    echo ("Missing Email Address");
}else if(empty($new_pw)){
    echo("Please Insert a New Password");
}else if(strlen($new_pw) < 5 || strlen($new_pw) > 20){
    echo("Invalid Password");
}else if(empty($retype_pw)){
    echo("Please Retype the New Password");
}else if($new_pw != $retype_pw){
    echo("Password does not match");
}else if(empty($verification_code)){
    echo("Please enter your Verification Code");
}else {

    $u_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `verification_code`='".$verification_code."'");
    $u_num = $u_rs->num_rows;

    if($u_num == 1){

        Database::iud("UPDATE `user` SET `password`='".$new_pw."' WHERE `email`='".$email."'");
        echo("Password Reset Success !!!");

    }else {
        echo("Invalid Email Address or Verification Code");
    }
}

?>