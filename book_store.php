<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advanced Search | WisdomLanka.com</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="semantic.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="resources/logo/log.png">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="row">

                    <?php include "header.php"; ?>

                    <div class="col-12 bg-body mt-3">
                        <div class="row">

                            <div class="col-12 col-lg-2">
                                <div class="logo-icon"></div>
                            </div>

                            <div class="col-12 col-lg-8 mt-4">
                                <p class="fw-bold fs-1 text-primary">Study Materials</p>
                            </div>

                        </div>
                    </div>

                    <hr class="col-12 col-lg-8 offset-lg-2" />

                    <div class="col-12">
                        <div class="row">

                            <div class="bg-light offset-lg-2 col-12 col-lg-8 bg-body rounded rounded-2 mb-2 g-2">
                                <div class="row">
                                    <div class="offset-lg-1 col-12 col-lg-10">
                                        <div class="row">
                                            <div class="col-12 col-lg-10 mt-1 mb-1">
                                                <input type="text" class="form-control border border-primary border-1" placeholder="Type Keyword to Search...">
                                            </div>
                                            <div class="col-12 col-lg-2 mt-1 mb-1 d-grid">
                                                <button class="btn btn-outline-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                    require "connection.php";

                    $category_rs = Database::search("SELECT * FROM `category`");
                    $category_num = $category_rs->num_rows;

                    for ($x = 0; $x < $category_num; $x++) {
                        $category_data = $category_rs->fetch_assoc();

                    ?>

                        <div class="col-12 p-2">
                            <div class="row">

                                <div class="col-12 mt-3 mb-3">
                                    <a href="" class="text-decoration-none link-dark fs-3 fw-bold"><?php echo $category_data["category_name"]; ?>&nbsp;&nbsp;&rarr;</a>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center gap-4">

                                        <?php

                                        $product_rs = Database::search("SELECT * FROM `resource` WHERE `resource_mode_resource_mode_id` = '2' AND
                                        `status_status_id`='1' AND `category_category_id` = '" . $category_data["category_id"] . "' ORDER BY `datetime_added` LIMIT 4 OFFSET 0");

                                        $product_num = $product_rs->num_rows;

                                        for ($y = 0; $y < $product_num; $y++) {
                                            $product_data = $product_rs->fetch_assoc();

                                            if ($product_num == 0) {
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
                                            } else {

                                            ?>

                                                <div class="card col-lg-2 mt-2 mb-2 border-1 border-info rounded rounded-4 shadow" style="width: 18rem;">

                                                    <?php
                                                    if ($product_data["qty"] > 0) {
                                                    ?>

                                                        <div class="ui two column grid">
                                                            <div class="column mt-3">
                                                                <a class="ui purple ribbon label">In Stock</a>
                                                            </div>
                                                        </div>

                                                    <?php
                                                    } else {
                                                    ?>

                                                        <div class="ui two column grid">
                                                            <div class="column mt-3">
                                                                <a class="ui red ribbon label">Out of Stock</a>
                                                            </div>
                                                        </div>

                                                    <?php
                                                    }
                                                    ?>

                                                    <img src="resources/product images/book.png" class="card-img-fluid">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $product_data["title"]; ?></h5>

                                                        <span class="card-text text-black fw-bold"><?php echo $product_data["qty"]; ?> Items Available</span><br />
                                                        <span class="card-text fs-5 text-primary fw-bold">Rs. <?php echo $product_data["price"]; ?> .00</span><br />


                                                        <a href="" class="col-12 ui inverted green button mt-2">Buy Now</a>
                                                        <button class="col-12 ui inverted red button mt-2">Add to Cart</button>

                                                        <button class="col-12 ui yellow button mt-2">
                                                            <i class="bi bi-heart-fill fs-5"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                        <?php
                                            }
                                        }
                                        ?>

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
    </div>
    </div>


    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>