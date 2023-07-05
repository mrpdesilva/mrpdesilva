<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMAiler\PHPMailer;

if (isset($_GET["e"])) {
    $email = $_GET["e"];

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {

        $v_code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code`='" . $v_code . "' WHERE `email`='" . $email . "'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'roshanipiumali8@gmail.com';
        $mail->Password = 'osijlsqofzotbjtf';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('roshanipiumali8@gmail.com', 'Reset Password');
        $mail->addReplyTo('roshanipiumali8@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'WisdomLanka.lk Forgot Password Verification Code';
        $bodyContent = '<h3 style="color:black"; "font-weight:bold"; "font-family:"Signika"">Your Verification Code to reset your Password is ' . $v_code . '</h3>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo ("Verification Code Sending Failed !!!");
        } else {
            echo ("Success !!!");
        }
    }else{
        echo ("Invalid Email !!!");
    }

}else{
    echo("Please Enter a Valid Email Address !!!");
}

?>