<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Profile | WisdomLanka.lk</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="resources/logo/log.png">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            include "header.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                $user_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` 
                ON user.gender_gender_id = gender.gender_id WHERE `email` = '" . $email . "'");

                $image_rs = Database::search("SELECT * FROM `profile_images` WHERE `user_email` = '" . $email . "'");

                $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
                user_has_address.city_city_id = city.city_id INNER JOIN `district` ON city.district_district_id = district.district_id INNER JOIN 
                `province` ON district.province_province_id = province.province_id WHERE `user_email` = '" . $email . "'");

                $user_data = $user_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();
            ?>

                <div class="col-12 pt-5 pb-5">
                    <div class="row">

                        <div class="col-12 col-lg-10 offset-lg-1 border border-primary border-1">
                            <div class="row g-2">

                                <div class="col-12 col-lg-3 bg-transparent border-1 border-primary border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-3">

                                        <?php

                                        if (empty($image_data["path"])) {

                                        ?>

                                            <img src="resources/profile images/1.png" class="rounded" style="width: 150px;" id="veiwimg" />

                                        <?php

                                        } else {

                                        ?>

                                            <img src="<?php echo $image_data["path"]; ?>" class="rounded" style="width: 150px;" id="veiwimg" />

                                        <?php

                                        }

                                        ?>

                                        <span class="fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></span>
                                        <span class="fw-bold text-black-50"><?php echo $email; ?></span>

                                        <input type="file" class="d-none" id="profileimg" accept="image/*">
                                        <label for="profileimg" class="btn btn-primary mt-3" onclick="changeProfileImage();">Update Profile Image</label>

                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 bg-transparent border-1 border-primary border-end p-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $user_data["fname"]; ?>" id="fname">
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $user_data["lname"]; ?>" id="lname">
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Mobile</label>
                                                    <input type="text" class="form-control" value="<?php echo $user_data["mobile"]; ?>" id="mobile">
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="<?php echo $user_data["password"]; ?>" id="pwd"/>
                                                        <span class="input-group-text " id="basic-addon2">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" readonly value="<?php echo $email; ?>">
                                                </div>

                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Registered Date</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $user_data["joined_datetime"]; ?>">
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-12 col-lg-5 bg-transparent p-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">

                                                <?php

                                                if (!empty($address_data["line1"])) {

                                                ?>

                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">Address Line 01</label>
                                                        <input type="text" class="form-control" value="<?php echo $address_data["line1"]; ?>" id="line1">
                                                    </div>

                                                <?php

                                                } else {

                                                ?>

                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">Address Line 01</label>
                                                        <input type="text" class="form-control" value="" id="line1">
                                                    </div>

                                                <?php

                                                }

                                                if (!empty($address_data["line2"])) {

                                                ?>

                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">Address Line 02</label>
                                                        <input type="text" class="form-control" value="<?php echo $address_data["line2"]; ?>" id="line2">
                                                    </div>

                                                <?php
                                                } else {

                                                ?>

                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">Address Line 02</label>
                                                        <input type="text" class="form-control" value="" id="line2">
                                                    </div>

                                                <?php
                                                }

                                                $province_rs = Database::search("SELECT * FROM `province`");
                                                $district_rs = Database::search("SELECT * FROM `district`");
                                                ?>

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">Province</label>
                                                    <select class="form-select" id="province">
                                                        <option value="0">Select Province</option>

                                                        <?php

                                                        $province_num = $province_rs->num_rows;

                                                        for ($x = 0; $x < $province_num; $x++) {
                                                            $province_data = $province_rs->fetch_assoc();

                                                        ?>

                                                            <option value="<?php echo $province_data["province_id"]; ?>" <?php

                                                                                                                            if (!empty($address_data["province_province_id"])) {
                                                                                                                                if ($province_data["province_id"] == $address_data["province_province_id"]) {
                                                                                                                            ?>selected <?php
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                        ?>><?php echo $province_data["province_name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">District</label>
                                                    <select class="form-select" id="district">
                                                        <option value="0">Select District</option>

                                                        <?php

                                                        $district_num = $district_rs->num_rows;

                                                        for ($y = 0; $y < $district_num; $y++) {
                                                            $district_data = $district_rs->fetch_assoc();

                                                        ?>

                                                            <option value="<?php echo $district_data["district_id"]; ?>" <?php

                                                                                                                            if (!empty($address_data["district_district_id"])) {
                                                                                                                                if ($district_data["district_id"] == $address_data["district_district_id"]) {
                                                                                                                            ?>selected <?php
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                        ?>><?php echo $district_data["district_name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                                <div class="col-6 mb-3">
                                                    <label class="form-label">City</label>
                                                    <select class="form-select" id="city">
                                                        <option value="0">Select City</option>

                                                        <?php

                                                        $city_rs = Database::search("SELECT * FROM `city`");

                                                        $city_num = $city_rs->num_rows;

                                                        for ($z = 0; $z < $city_num; $z++) {
                                                            $city_data = $city_rs->fetch_assoc();

                                                        ?>

                                                            <option value="<?php echo $city_data["city_id"]; ?>" <?php

                                                                                                                    if (!empty($address_data["city_city_id"])) {
                                                                                                                        if ($city_data["city_id"] == $address_data["city_city_id"]) {
                                                                                                                    ?>selected <?php
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                        ?>><?php echo $city_data["city_name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>

                                                <?php

                                                if (!empty($address_data["postal_code"])) {

                                                ?>

                                                    <div class="col-6 mb-3">
                                                        <label class="form-label">Postal-Code</label>
                                                        <input type="text" class="form-control" value="<?php echo $address_data["postal_code"]; ?>" id="pcode">
                                                    </div>

                                                <?php
                                                } else {

                                                ?>

                                                    <div class="col-6 mb-3">
                                                        <label class="form-label">Postal-Code</label>
                                                        <input type="text" class="form-control" value="" id="pcode">
                                                    </div>

                                                <?php
                                                }
                                                ?>

                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Gender</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $user_data["gender_name"]; ?>">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 col-lg-4 offset-lg-4 d-grid mt-3">
                            <button class="btn btn-primary" onclick="updateUserProfile();">Update My Profile</button>
                        </div>

                    </div>

                </div>

            <?php
            } else {

            ?>

                <div class="col-12 mt-5 mb-5">
                    <div class="row p-3">

                        <div class="col-12 col-lg-8 p-5 offset-2 text-center border border-dark border-2 rounded rounded-4">
                            <span class="fs-1 fw-bold text-black">Please Log In to View User Profile...</span><br /><br />
                            <i class="bi bi-emoji-wink fs-1 text-black"></i>
                        </div>

                    </div>
                </div>

            <?php
            }
            ?>

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>