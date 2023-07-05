<?php

require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];
$status = $_POST["status"];

if(empty($fname)){
   echo ("Please enter your First name !!!");
}else if(strlen($fname) > 50){
    echo ("First Name must have less than 50 characters !!!");
}else if(empty($lname)){
    echo ("Please enter Your Last Name !!!");
}else if(strlen($lname) > 50){
    echo ("Last Name must have less than 50 characters !!!");
}else if(empty($email)){
    echo ("Please enter Your Email !!!");
}else if(strlen($email) >= 100){
    echo ("Email must have less than 100 characters !!!");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if(empty($password)){
    echo ("Please enter Your Password !!!");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must be between 5-20 characters !!!");
}else if(empty($mobile)){
    echo ("Please enter Your Mobile !!!");
}else if(strlen($mobile) != 10){
    echo ("Mobile Number must have 10 characters !!!");
}else if(!preg_match("/07[1,2,4,5,6,7,8][0-9]/",$mobile)){
    echo ("Invalid Mobile Number !!!");
}else if($gender == 0){
    echo ("Please select a Gender !!!");
}else{

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $user_num = $user_rs->num_rows;

    if($user_num > 0){

        echo ("User with the same Email or Mobile Number already exists");

    }else{

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`email`,`fname`,`lname`,`password`,`mobile`,`joined_datetime`,`status_status_id`,`gender_gender_id`) VALUES 
        ('".$email."','".$fname."','".$lname."','".$password."','".$mobile."','".$date."','".$status."','".$gender."')");

        echo("Success");

    }

}

?>