<?php

include_once('configuration_db.php');


//check if page_id is set.Set id = 1 for main_page if not
if (!isset($_GET['page_id'])) {
    $_GET['page_id']=1;
    header('location: ./index.php?page_id=1');
}
else {

    $page_id = $_GET['page_id'];

    //select all from table pages
    $sql = 'select * from pages WHERE id_page = ' . $page_id;

    $sql_result = configuration_db::db_connect($sql);
    $result = $sql_result->fetch_assoc();

    //if Id of pages is not found. Got error
    if ($sql_result->num_rows == 0) {
        echo ' <script>
                alert("Toto Id stranky neni dostupne. Budete presmerovani na predeslou stranku");
                  window.history.back();
            </script>';
    } else {

        $page_location = $result['page_location'];
        //var_dump($result['access']);
        include('/models/' . $page_location);
    }
    return;
}

