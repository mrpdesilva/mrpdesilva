<?php

require "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `resource`";

if (!empty($txt) && $select == 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `category_category_id` = '" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' AND `category_category_id` = '" . $select . "'";
}

?>

<div class="col-12 col-lg-12 mt-4 mb-5 ps-5">
    <div class="row">

        <?php

        if ("0" != ($_POST["page"])) {
            $pageno = $_POST["page"];
        } else {
            $pageno = 1;
        }

        $resource_rs = Database::search($query);
        $resource_num = $resource_rs->num_rows;

        $results_per_page = 10;
        $number_of_pages = ceil($resource_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();

        ?>

            <!-- <div class="col-12 border border-1 border-dark-subtle rounded rounded-4 p-4 mb-3">
                <div class="row">

                    <div class="col-12 col-lg-8 p-2 ps-5 mt-2 mb-3" style="cursor: pointer;">
                        <span class="fw-bold fs-5"><?php echo $selected_data["title"]; ?></span>
                    </div>

                    <div class="col-12 col-lg-4 p-2">
                        <button class="ui green button shadow rounded rounded-5" onclick="filePreview('<?php echo $selected_data['resource_id']; ?>');">Preview and Download File</button>
                    </div>

                </div>
            </div> -->

            <div class="card mb-3 m-1" style="max-width: 500px;">
                <div class="row g-0">
                    <div class="col-md-4 my-5">
                        <img src="resources/background images/Advanced Level Biology 2022 Marking Scheme.png" class="img-fluid rounded-start" style="height: 90px; width: 500px;">
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
        <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <a class="page-link" <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                    } ?> aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php

                    for ($x = 1; $x <= $number_of_pages; $x++) {
                        if ($x == $pageno) {
                    ?>
                            <li class="page-item active">
                                <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="page-item">
                                <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                            </li>
                    <?php
                        }
                    }

                    ?>

                    <li class="page-item">
                        <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                    } ?> aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!--  -->‌

    </div>
</div>