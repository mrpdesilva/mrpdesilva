<?php

require "connection.php";

$selectYear = $_POST["selectYear"];
$examination = $_POST["examination"];
$grade = $_POST["grade"];
$medium = $_POST["medium"];
$categoryId = $_POST["categoryId"];

$query = "SELECT * FROM `resource` WHERE `category_category_id` = '" . $categoryId . "'";

if (!empty($selectYear)) {
    $query .= " AND `year_year_id` LIKE '%" . $selectYear . "%'";
}

if ($examination != 0) {
    $query .= " AND `term_term_id`='" . $examination . "'";
}

if ($grade != 0) {
    $query .= " AND `grade_grade_id`='" . $grade . "'";
}

if ($medium != 0) {
    $query .= " AND `medium_medium_id`='" . $medium . "'";
}

?>

<?php

if ("0" != ($_POST["page"])) {
    $pageno = $_POST["page"];
} else {
    $pageno = 1;
}

$school_papers_rs = Database::search($query);
$school_papers_num = $school_papers_rs->num_rows;

$results_per_page = 10;
$number_of_pages = ceil($school_papers_num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;

$selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

$selected_num = $selected_rs->num_rows;

for ($x = 0; $x < $selected_num; $x++) {
    $selected_data = $selected_rs->fetch_assoc();

?>

    <div class="card mb-3" style="max-width: 800px;">
        <div class="row g-0">
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

<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo "#";
                                        } else {
                                        ?> onclick="sort('<?php echo ($pageno - 1) ?>');" <?php
                                                                                        } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {

                if ($x == $pageno) {

            ?>

                    <li class="page-item active">
                        <a class="page-link" onclick="sort('<?php echo $x; ?>');"><?php echo $x; ?></a>
                    </li>

                <?php

                } else {

                ?>

                    <li class="page-item">
                        <a class="page-link" onclick="sort('<?php echo $x; ?>');"><?php echo $x; ?></a>
                    </li>

            <?php

                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo "#";
                                        } else {
                                        ?> onclick="sort('<?php echo ($pageno + 1) ?>');" <?php
                                                                                        } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>