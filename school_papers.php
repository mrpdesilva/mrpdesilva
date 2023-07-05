<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>School Papers</title>

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
                                <span class="fs-1 fw-bolder text-white" style="font-family: 'NotoSerif';">School Papers</span>
                            </div>

                            <div class="col-6 col-lg-2 offset-lg-6 pt-2 my-4 d-grid">
                                <div class="ui vertical animated button ui yellow button" tabindex="0" onclick="window.location = 'provincialPapers.php';">
                                    <div class="hidden content text-black">Provicial Papers</div>
                                    <div class="visible content province-icon"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 ps-3 pe-3">
                        <div class="row">

                        <?php
                        
                        if(isset($_SESSION["u"])){
                        
                        ?>

                            <div class="col-12 col-lg-2 mt-3 mb-5 pt-2 pb-2 ps-4 pe-4 border border-1 border-info">
                                <div class="row">
                                    <p class="fs-4 fw-bold text-black-50" style="font-family: 'signika';">Sort Materials</p>

                                    <p class="fs-5 fw-bold text-black" style="font-family: 'Ubuntu-Medium';">By Year</p>

                                    <select class="form-select" style="font-family: 'Ubuntu';" id="year-select">
                                        <option value="0">Select Year</option>
                                        
                                        <?php

                                        require "connection.php";


                                        $school_papers_rs = Database::search("SELECT * FROM `resource` WHERE `category_category_id` = '1' AND `resource_mode_resource_mode_id` = '1'");

                                        $school_data = $school_papers_rs->fetch_assoc();

                                        $year_rs = Database::search("SELECT * FROM `year`");
                                        $year_num = $year_rs->num_rows;

                                        for ($y = 0; $y < $year_num; $y++) {
                                            $year_data = $year_rs->fetch_assoc();
                                        ?>

                                            <option value="<?php echo $year_data["year_id"]; ?>"><?php echo $year_data["year"]; ?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>

                                    <p class="fs-5 fw-bold text-black mt-4" style="font-family: 'signika';">By Examination</p>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r1" id="first">
                                            <label class="form-check-label" style="font-family: 'Ubuntu-Medium';">
                                                1st Term
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r1" id="second">
                                            <label class="form-check-label" style="font-family: 'Ubuntu-Medium';">
                                                2nd Term
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r1" id="third">
                                            <label class="form-check-label" style="font-family: 'Ubuntu-Medium';">
                                                3rd term
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r1" id="al">
                                            <label class="form-check-label" style="font-family: 'Ubuntu-Medium';">
                                                Advanced Level (A/L) Examination
                                            </label>
                                        </div>
                                    </div>

                                    <p class="fs-5 fw-bold text-black mt-4" style="font-family: 'signika';">By Grade</p>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r2" id="gr12">
                                            <label class="form-check-label" style="font-family: 'Ubuntu-Medium';">
                                                Grade 12
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r2" id="gr13">
                                            <label class="form-check-label" style="font-family: 'Ubuntu-Medium';">
                                                Grade 13
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r2" id="gr-al">
                                            <label class="form-check-label" style="font-family: 'Ubuntu-Medium';">
                                                Advanced Level (A/L) Examination
                                            </label>
                                        </div>
                                    </div>

                                    <p class="fs-5 fw-bold text-black mt-4" style="font-family: 'signika';">By Medium</p>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r3" id="eng">
                                            <label class="form-check-label" style="font-family: 'Ubuntu-Medium';">
                                                English
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="r3" id="sin">
                                            <label class="form-check-label" style="font-family: 'Ubuntu-Medium';">
                                                Sinhala
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center mt-3 mb-3">
                                        <div class="row g-2">
                                            <div class="col-12 col-lg-6 d-grid">
                                                <button class="ui inverted green button fw-bold" onclick="sort(0,'<?php echo $school_data['category_category_id']; ?>');">Sort</button>
                                            </div>

                                            <div class="col-12 col-lg-6 d-grid">
                                                <button class="ui inverted blue button fw-bold" onclick="clearSort();">Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-8 offset-lg-1 mt-4 mb-5 ps-5" id="sort">
                                <div class="row">

                                    <?php


                                    $school_papers_rs = Database::search("SELECT * FROM `resource` WHERE `category_category_id` = '1' AND `resource_mode_resource_mode_id` = '1'");

                                    $school_papers_num = $school_papers_rs->num_rows;

                                    for ($x = 0; $x < $school_papers_num; $x++) {
                                        $school_papers_data = $school_papers_rs->fetch_assoc();

                                    ?>

                                        <!-- <div class="col-12 border border-1 border-dark-subtle rounded rounded-4 p-4 mb-3">
                                            <div class="row">

                                                <div class="col-12 col-lg-7 p-2 ps-5 mt-2 mb-3" style="cursor: pointer;">
                                                    <span class="fw-bold fs-5"><?php echo $school_papers_data["title"]; ?></span>
                                                </div>

                                                <div class="col-12 col-lg-4 p-2">
                                                    <button class="ui green button shadow rounded rounded-5" onclick="filePreview('<?php echo $school_papers_data['resource_id']; ?>');">Preview and Download File</button>
                                                </div>

                                            </div>
                                        </div> -->

                                        <!-- <div class="card mb-3 rounded rounded-4">
                                            <img src="resources/background images/Advanced Level Biology 2022 Marking Scheme.png" class="card-img-top" style="height: 200px; width: 500px;">
                                            <div class="card-body">
                                                <h4 class="card-title fw-bold text-primary" style="font-family: 'signika';"><?php echo $school_papers_data["title"]; ?></h4>
                                                <p class="card-text fs-6 text-black-50" style="font-family: 'signika';">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                <div class="col-12 col-lg-4 p-2">
                                                    <button class="ui green button shadow rounded rounded-5" onclick="filePreview('<?php echo $school_papers_data['resource_id']; ?>');">Preview and Download File</button>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="card mb-3" style="max-width: 800px;">
                                            <div class="row g-0">
                                                <div class="col-md-4 my-5">
                                                    <img src="resources/background images/Advanced Level Biology 2022 Marking Scheme.png" class="img-fluid rounded-start" style="height: 100px; width: 250px;">
                                                </div>
                                                <div class="col-md-8 mt-3">
                                                    <div class="card-body">
                                                        <h4 class="card-title fw-bold text-primary" style="font-family: 'signika';"><?php echo $school_papers_data["title"]; ?></h4>
                                                        <p class="card-text fs-6 text-black-50" style="font-family: 'signika';">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                        <div class="col-12 col-lg-10 p-2">
                                                            <button class="ui green button shadow rounded rounded-5" onclick="filePreview('<?php echo $school_papers_data['resource_id']; ?>');">Preview and Download File</button>
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
                        }else {

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