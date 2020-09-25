<div class="pagination">
    <a href='?currentPage=1'>&laquo;</a>
    <?php
    if(!isset($addParam)){
        $addParam = "";
    }
    $startPage = $page->currentPage - 1;
    if ($startPage < 1) {
        $startPage = 1;
    }

    $endPage = $page->currentPage + 1;
    if ($endPage > $page->numberPage) {
        $endPage = $page->numberPage;
    }
    for ($startPage; $startPage <= $endPage; $startPage++) {
        if ((int)$startPage === (int)$page->currentPage) {
            echo '<a class="active" href="?currentPage=' . $startPage . '">' . $startPage . '</a>';
        } else {
            echo '<a href="?currentPage=' . $startPage . '">' . $startPage . '</a>';
        }
    }
    echo  "<a href='?currentPage=" . $page->numberPage . $addParam ."'>&raquo;</a>";
    ?>

</div>