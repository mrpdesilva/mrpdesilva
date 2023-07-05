<?php

session_start();

require "connection.php";

$email = $_POST["email"];
$password = $_POST["password"];
$rememberMe = $_POST["rememberMe"];

if(empty($email)){
    echo ("Please enter your Email !!!");
}else if(strlen($email) >= 100){
    echo ("Email must have less than 100  characters !!!");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if(empty($password)){
    echo ("Please enter your Password !!!");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo ("Password must be between 5-20 chatacters");
}else {

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."'");
    $user_num = $user_rs->num_rows;

    if($user_num == 1){

        $user_data = $user_rs->fetch_assoc();

        $_SESSION["u"] = $user_data;

        if($user_data["status_status_id"] == 1){

            if($rememberMe == "true"){
                setcookie("email",$email,time()+(60*60*24*365));
                setcookie("password",$password,time()+(60*60*24*365));
            }else{
                setcookie("email","",-1);
                setcookie("password","",-1);
            }

            echo ("Success");

        }else{
            echo ("You are not a valid User !!!");
        }

    }else{
        echo("Invalid Email or Password !!!");
    }

}

?>