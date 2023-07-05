<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mobile = $_POST["mobile"];
    $pwd = $_POST["pwd"];
    $line1 = $_POST["line1"];
    $line2 = $_POST["line2"];
    $province = $_POST["province"];
    $district = $_POST["district"];
    $city = $_POST["city"];
    $pcode = $_POST["pcode"];

    if(isset($_FILES["image"])){
        
        $image = $_FILES["image"];

        $allowed_image_extensions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_extension = $image["type"];

        if(!in_array($file_extension, $allowed_image_extensions)){
            echo("Please Select a Valid Image");
        }else{

            $new_file_extension;

            if ($file_extension == "image/jpg") {
                $new_file_extension = ".jpg";
            } else if ($file_extension == "image/jpeg") {
                $new_file_extension = ".jpeg";
            } else if ($file_extension == "image/png") {
                $new_file_extension = ".png";
            } else if ($file_extension == "image/svg+xml") {
                $new_file_extension = ".svg";
            }

            $file_name = "resources/profile images/" .$_SESSION["u"]["fname"]. "_".uniqid().$new_file_extension;

            move_uploaded_file($image["tmp_name"],$file_name);

            $image_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email` = '".$_SESSION["u"]["email"]."'");

            $image_num = $image_rs->num_rows;

            if($image_num == 1){
                
                Database::iud("UPDATE `profile_images` SET `path` = '".$file_name."' WHERE `user_email` = '".$_SESSION["u"]["email"]."'");

            }else{

                Database::iud("INSERT INTO `profile_images` (`path`,`user_email`) VALUES ('".$file_name."','".$_SESSION["u"]["email"]."')");

            }
        }
    }

    Database::iud("UPDATE `user` SET `fname` = '".$fname."', `lname` = '".$lname."', `mobile` = '".$mobile."', `password` = '".$pwd."'  WHERE `email` = '".$_SESSION["u"]["email"]."'");

    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '".$_SESSION["u"]["email"]."'");

    $address_num = $address_rs->num_rows;

    if($address_num == 1){

        Database::iud("UPDATE `user_has_address` SET `line1` = '".$line1."',
                                                    `line2` = '".$line2."',
                                                    `city_city_id` = '".$city."',
                                                    `postal_code` = '".$pcode."' WHERE `user_email` = '".$_SESSION["u"]["email"]."'");

    }else{

        Database::iud("INSERT INTO `user_has_address` (`line1`,`line2`,`user_email`,`city_id`,`postal_code`) VALUES 
        ('".$line1."', '".$line2."', '".$_SESSION["u"]["email"]."', '".$city."', '".$pcode."')");

        echo ("Success");

    }

}else{
    echo("Please Login to Your Account First");
}

?>