<?php
include_once('configuration_db.php');
include_once('./core/template/page_main.php');
include_once('./core/controler/page_controler.php');



//check if page_id is set.Set id = 1 for main_page if not
if (!isset($_GET['page_id'])) {
    $_GET['page_id']=1;
    header('location: ./index.php?page_id=1');
}
else {

    $page_id = $_GET['page_id'];
    //select all from table pages
    $sql = 'select * from pageid WHERE page_id = ' . $page_id;

    $sql_result = configuration_db::db_connect($sql);
    $result = $sql_result->fetch_assoc();

    //IF Id of pages is not found. Got error
    if ($sql_result->num_rows == 0) {
        echo ' <script>
                alert("Tato stánka není dostupná. Budete presmerovani na predeslou stranku");
                  window.history.back();
            </script>';
    }
    //ELSE check if user have access to load the page
    else {

        //IF access is correct, return page
        $page_access = $result['page_access'];
        if (page_controler::checkUserAccess($page_access)) {
            $page_location = $result['page_location'];
            include($page_location);
        }
        //ELSE return notice
        else{
            echo "<div class='access_denied'>You have no access</div>";
        }
    }
    return;
}

