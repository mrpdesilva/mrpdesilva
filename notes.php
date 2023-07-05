<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notes</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="resources/logo/log.png">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php"; ?>

            <div class="col-12">
                <div class="row">

                    <div class="col-12 bg-primary">
                        <div class="row">

                            <div class="col-6 col-lg-3 my-4 mx-5">
                                <span class="fs-1 fw-bolder text-white" style="font-family: 'NotoSerif';">Lesson Notes</span>
                            </div>

                        </div>
                    </div>

                    <?php

                    if (isset($_SESSION["u"])) {

                    ?>

                        <div class="col-12 ps-3 pe-3">
                            <div class="row">

                                <div class="col-12 col-lg-8 offset-lg-2 mt-4 p-3">
                                    <div class="row">
                                        <input type="text" placeholder="Search Notes..." class="form-control fs-6" id="search-notes">
                                    </div>

                                    <div class="col-12 col-lg-12 mt-3 mb-3">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 offset-lg-3 d-grid mt-3 mt-lg-0">
                                                <button class="ui inverted green button fw-bold" onclick="notesSearch(0);">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="col-12 col-lg-10 offset-lg-1" />


                                <div class="col-12 col-lg-12 offset-lg-1 mt-4 mb-5 ps-5">
                                    <div class="row" id="result">

                                        <?php

                                        require "connection.php";

                                        $notes_rs = Database::search("SELECT * FROM `resource` WHERE `category_category_id` = '6' AND `resource_mode_resource_mode_id` = '1'");

                                        $notes_num = $notes_rs->num_rows;

                                        for ($x = 0; $x < $notes_num; $x++) {
                                            $notes_data = $notes_rs->fetch_assoc();

                                        ?>

                                            <!-- <div class="col-12 border border-1 border-dark-subtle rounded rounded-4 p-4 mb-3">
                                            <div class="row">

                                                <div class="col-12 col-lg-7 p-2 mt-2 mb-3" style="cursor: pointer;">
                                                    <span class="fw-bold fs-5"><?php echo $notes_data["title"]; ?></span>
                                                </div>

                                                <div class="col-12 col-lg-4 p-2">
                                                    <button class="ui green button shadow rounded rounded-5" onclick="filePreview('<?php echo $notes_data['resource_id']; ?>');">Preview and Download File</button>
                                                </div>

                                            </div>
                                        </div> -->

                                            <div class="card col-12 col-lg-5 m-1 mb-3">
                                                <div class="row">
                                                    <div class="col-md-4 my-5">
                                                        <img src="resources/background images/Advanced Level Biology 2022 Marking Scheme.png" class="img-fluid rounded-start" style="height: 100px; width: 250px;">
                                                    </div>
                                                    <div class="col-md-8 mt-3">
                                                        <div class="card-body">
                                                            <h4 class="card-title fw-bold text-primary" style="font-family: 'signika';"><?php echo $notes_data["title"]; ?></h4>
                                                            <p class="card-text fs-6 text-black-50" style="font-family: 'signika';">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                            <div class="col-12 col-lg-10 p-2">
                                                                <button class="ui green button shadow rounded rounded-5" onclick="filePreview('<?php echo $notes_data['resource_id']; ?>');">Preview and Download File</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php
                    } else {

                    ?>

                        <div class="col-12">
                            <div class="row p-3">

                                <div class="col-12 col-lg-8 p-5 offset-2 text-center border border-dark border-2 rounded rounded-4">
                                    <span class="fs-1 fw-bold text-black">Please Log In to get more...</span><br /><br />
                                    <i class="bi bi-emoji-wink fs-1 text-black"></i>
                                </div>

                            </div>
                        </div>

                    <?php

                    }

                    ?>

                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>