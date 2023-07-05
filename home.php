<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | WisdomLanka.lk</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="resources/logo/log.png">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php require "connection.php"; ?>

            <?php include "header.php"; ?>

            <div class="col-12 home_body">
                <div class="row">

                    <div class="col-12 d-lg-flex justify-content-center">
                        <div class="row align-items-center">

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12 logo"></div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-8 d-lg-block d-none">
                                <div class="row">
                                    <p class="fs-1 fw-semibold text-white text-header">WisdomLanka.lk</p>
                                    <p class="fs-5 text-black-50 text-body">Introduction of the Website</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="col-12 col-lg-10 offset-lg-1 mb-5 mt-5">
                        <div class="input-group shadow">
                            <input type="text" placeholder="Type keywords to Search..." class="form-control fs-6" aria-label="Text input with dropdown button" id="search-txt">

                            <select class="form-select text-center fs-6" style="max-width: 250px;" id="search-select">
                                <option value="0">All Categories</option>

                                <?php

                                $category_rs = Database::search("SELECT * FROM `category`");
                                $category_num = $category_rs->num_rows;

                                for ($x = 0; $x < $category_num; $x++) {
                                    $category_data = $category_rs->fetch_assoc();

                                ?>

                                    <option value="<?php echo $category_data["category_id"]; ?>"><?php echo $category_data["category_name"]; ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 offset-lg-4 d-grid mt-3 mt-lg-0">
                        <button class="ui inverted blue button" onclick="basicSearch(0);">Search</button>
                    </div>

                </div>
            </div>

            <hr class="col-12 col-lg-10 offset-lg-1 mt-5" />

            <div class="col-12 col-lg-10 offset-lg-1 mt-4 mb-5 ps-5" id="basicSearchResult"></div>

            <div class="col-12 bg-body mb-3">
                <div class="row">

                    <div class="col-12 col-lg-12 offset-lg-2 justify-content-center">
                        <div class="row">

                            <div class="col-6 col-lg-2">
                                <div class="col-12 icon1" onclick="window.location = 'school_papers.php'"></div>
                                <p class="fs-3 text-primary text-center mt-4">School Papers</p>
                            </div>

                            <div class="col-6 col-lg-2">
                                <div class="col-12 icon1" onclick="window.location = 'model_papers.php'"></div>
                                <p class="fs-3 text-primary text-center mt-4">Model Papers</p>
                            </div>

                            <div class="col-6 col-lg-2">
                                <div class="col-12 icon1" onclick="window.location = 'past_papers.php'"></div>
                                <p class="fs-3 text-primary text-center mt-4">Past Papers</p>
                            </div>

                            <div class="col-6 col-lg-2">
                                <div class="col-12 icon2" onclick="window.location = 'marking_schemes.php'"></div>
                                <p class="fs-3 text-primary text-center mt-4">Marking Schemes</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-lg-12 offset-lg-2 mt-5 justify-content-center">
                        <div class="row">

                            <div class="col-6 col-lg-2">
                                <div class="col-12 icon3" onclick="window.location = 'notes.php'"></div>
                                <p class="fs-3 text-primary text-center mt-4">Notes</p>
                            </div>

                            <div class="col-6 col-lg-2">
                                <div class="col-12 icon4" onclick="window.location = 'resource_books.php'"></div>
                                <p class="fs-3 text-primary text-center mt-4">Resource Books</p>
                            </div>

                            <div class="col-6 col-lg-2">
                                <div class="col-12 icon5"></div>
                                <p class="fs-3 text-primary text-center mt-4">EDEXEL</p>
                            </div>

                            <div class="col-6 col-lg-2">
                                <div class="col-12 icon6"></div>
                                <p class="fs-3 text-primary text-center mt-4">Videos</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <hr class="col-12 col-lg-10 offset-lg-1 mt-5 mb-5" />

        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>