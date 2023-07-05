<?php

require "connection.php";

$search = $_POST["search"];

$query = "SELECT * FROM `resource` WHERE `category_category_id` = '6' AND `title` LIKE '%" . $search . "%'";
?>

        <?php

        if ("0" != ($_POST["page"])) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }

        $notes_rs = Database::search($query);
        $notes_num = $notes_rs->num_rows;

        $results_per_page = 10;
        $number_of_pages = ceil($notes_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();

        ?>

            <div class="card col-12 col-lg-5 m-1 mb-3">
                <div class="row">
                    <div class="col-md-4 my-5">
                        <img src="resources/background images/Advanced Level Biology 2022 Marking Scheme.png" class="img-fluid rounded-start" style="height: 100px; width: 250px;">
                    </div>
                    <div class="col-md-8 mt-3">
                        <div class="card-body">
                            <h4 class="card-title fw-bold text-primary" style="font-family: 'signika';"><?php echo $selected_data["title"]; ?></h4>
                            <p class="card-text fs-6 text-black-50" style="font-family: 'signika';">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="col-12 col-lg-10 p-2">
                                <button class="ui green button shadow rounded rounded-5" onclick="filePreview('<?php echo $selected_data['resource_id']; ?>');">Preview and Download File</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>

        <!--  -->
        <div class="col-12 col-lg-10 offset-lg-4 text-center mb-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-lg">
                    <li class="page-item">
                        <a class="page-link" <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                ?> onclick="notesSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                    } ?> aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php

                    for ($x = 1; $x <= $number_of_pages; $x++) {
                        if ($x == $pageno) {
                    ?>
                            <li class="page-item active">
                                <a class="page-link" onclick="notesSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="page-item">
                                <a class="page-link" onclick="notesSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                            </li>
                    <?php
                        }
                    }

                    ?>

                    <li class="page-item">
                        <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                ?> onclick="notesSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                    } ?> aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!--  -->