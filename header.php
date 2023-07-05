<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="semantic.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="resources/logos/l1.png" />
</head>

<body>

    <div class="container-fluid bg-body border border-1 border-top-0 border-end-0 border-start-0">
        <div class="row">

            <div class="col-12">
                <div class="row mt-2 mb-2">
                    <div class="offset-lg-1 col-12 col-lg-4 align-self-start mt-2">

                        <?php

                        session_start();

                        if (isset($_SESSION["u"])) {
                            $data = $_SESSION["u"];

                        ?>

                            <span class="text-lg-start fs-6 fw-bold">Welcome <?php echo $data["fname"]; ?> </span> |
                            <span class="text-lg-start fw-bold fs-6" onclick="signOut();" style="cursor: pointer;">Sign Out</span>

                        <?php

                        } else {

                        ?>

                            <a href="index.php" class="text-decoration-none fw-bold fs-6" style="font-family: 'signika';">Sign In or Register</a>

                        <?php
                        }
                        ?>

                    </div>

                    <div class="offset-lg-4 col-12 col-lg-3 align-self-end">
                        <div class="row">

                            <div class="col-12 col-lg-8 dropdown d-grid">
                                <button class="ui basic black button fw-bold" style="font-family: 'signika';" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                                    Menu
                                </button>

                                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title fs-3 text-primary fw-bold" id="offcanvasWithBothOptionsLabel" style="font-family: 'signika';">Menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>

                                    <div class="offcanvas-body">
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;" onclick="window.location = 'school_papers.php';"><i class="bi bi-stickies fs-4 text-black"></i>&nbsp;&nbsp;School Papers</p>
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;" onclick="window.location = 'model_papers.php';"><i class="bi bi-stickies fs-4 text-black"></i>&nbsp;&nbsp;Model Papers</p>
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;" onclick="window.location = 'past_papers.php';"><i class="bi bi-stickies fs-4 text-black"></i>&nbsp;&nbsp;Past Papers</p>
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;"><i class="bi bi-stickies fs-4 text-black" onclick="window.location = 'provincialPapers.php';"></i>&nbsp;&nbsp;Provicial Papers</p>
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;" onclick="window.location = 'marking_schemes.php';"><i class="bi bi-journal-check fs-4 text-black"></i>&nbsp;&nbsp;Marking Schemes</p>
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;" onclick="window.location = 'resource_books.php';"><i class="bi bi-journals fs-4 text-black"></i>&nbsp;&nbsp;Resource Books</p>
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;" onclick="window.location = 'notes.php';"><i class="bi bi-journal-text fs-4 text-black"></i>&nbsp;&nbsp;Notes</p>
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;"><i class="bi bi-card-text fs-4 text-black"></i>&nbsp;&nbsp;EDEXEL</p>
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;" onclick="window.location = 'book_store.php';"><i class="bi bi-book fs-4 text-black"></i>&nbsp;&nbsp;Study Materials</p>
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;"><i class="bi bi-postage fs-4 text-black"></i>&nbsp;&nbsp;Hobbies</p>
                                        <p class="fs-5 fw-bold text-black-50" style="cursor: pointer;"><i class="bi bi-camera-video fs-4 text-black"></i>&nbsp;&nbsp;Videos</p>
                                    </div>

                                </div>
                            </div>

                            <div class="col-10 col-lg-3 ms-5 ms-lg-0 mt-1 dropdown user-icon" style="cursor: pointer;" type="button" data-bs-toggle="dropdown" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false">
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="userProfile.php" onclick="window.location = 'profile.php'">My Profile</a></li>

                                    <li><a class="dropdown-item" href="myProducts.php" onclick="window.location = 'book_store.php';">My Study Materials</a></li>
                                    <li><a class="dropdown-item" href="watchlist.php">Cart</a></li>
                                    <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li>
                                    <li><a class="dropdown-item" href="purchaseHistory.php">Purchase History</a></li>
                                    <li><a class="dropdown-item" href="messagePage.php">
                                            Contact Admin
                                        </a></li>
                                </ul>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>