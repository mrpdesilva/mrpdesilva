<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WisdomLanka</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="resources/logo/log.png">
</head>

<body class="main-body">

    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">

            <!-- header -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 signIn-logo"></div>
                    <div class="col-12 mt-4">
                        <p class="text-center fs-3" style="font-family: 'Pacifico';">Hi, Welcome to WisdomLanka.com</p>
                    </div>
                </div>
            </div>
            <!-- header -->

            <div class="col-12 p-3">
                <div class="row">

                    <div class="col-6 d-none d-lg-block login"></div>

                    <div class="col-12 col-lg-6" id="signUpBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="fs-4 fw-bold">Create New Account</p>
                            </div>

                            <div class="col-12 d-none" id="msgdiv">
                                <span class="text-danger fw-bold" id="msg"></span>
                            </div>

                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" id="fname">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lname">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Mobile</label>
                                <input type="text" class="form-control font" id="mobile">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select font" id="gender">
                                    <option value="0">Select Gender</option>

                                    <?php

                                    require "connection.php";

                                    $gender_rs = Database::search("SELECT * FROM `gender`");
                                    $gender_num = $gender_rs->num_rows;

                                    for ($x = 0; $x < $gender_num; $x++) {
                                        $gender_data = $gender_rs->fetch_assoc();
                                    ?>

                                        <option value="<?php echo $gender_data["gender_id"]; ?>"><?php echo $gender_data["gender_name"]; ?></option>

                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="ui primary button" onclick="signUp();">Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="ui green button" onclick="changeView();">Already have an Acount? Sign In</button>
                            </div>
                            <div class="col-12 col-lg-12 d-grid">
                                <button class="ui basic secondary button">Admin Sign In</button>
                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-lg-6 d-none" id="signInBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="fs-4 fw-bold">Sign In to Your Account</p>
                            </div>

                            <div class="col-12 d-none" id="msgdiv2">
                                <span class="text-danger fw-bold" id="msg2"></span>
                            </div>

                            <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="e" value="<?php echo $email; ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="p" value="<?php echo $password; ?>">
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="rememberMe">
                                    <label class="form-check-label">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="link-secondary fw-bold" onclick="forgotPassword();">Forgot Password?</a>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="ui secondary button" onclick="signIn();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="ui primary button" onclick="window.location = 'index.php'">New User? Sign Up</button>
                            </div>

                        </div>
                    </div>

                    <!-- forgot Password model -->
                    <div class="modal" tabindex="-1" id="forgotPasswordModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fw-bold">Reset Password</h3>
                                    <button type="button" class="btn-close" id="npb" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <label class="form-label fw-bold p-2">New Password</label>
                                                <input type="password" class="form-control" id="new-pw">
                                                <button class="ui button" type="button" 
                                                        id="new-pw-btn" onclick="showPassword1();">
                                                        <i id="e1" class="bi bi-eye-slash-fill"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <label class="form-label fw-bold p-2">Re-Type Password</label>
                                                <input type="password" class="form-control" id="retype-pw">
                                                <button class="ui button" type="button" 
                                                        id="retype-pw-btn" onclick="showPassword2();">
                                                        <i id="e1" class="bi bi-eye-slash-fill"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-bold">Verification Code</label>
                                            <input type="text" class="form-control" id="verification-code">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="ui basic black button" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="ui black button" onclick="resetPassword();">Reset Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- forgot Password model -->

                </div>
            </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>