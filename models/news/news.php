<?php
require_once('Db_load_news.php');
?>

<div class='info_bar_module'>
    <div class='text'>
        <b>
            <p>Tot bude hlavicka ktera popisuje zakladni definici modulu, Nezapomenout ji vyplnit.
            Bude obsahovat ucel modulu a zpusob jak s nim pracovat.<p/>

            <br/>
            bla bla
            <br />
        </b>
    </div>
</div>

<div class='items_under_infobar'>
    <?php
    $news = Db_load_news::prepare_select_quests();
    if (!$news){
        echo "Zádné položky k zobrazení";
    }
    else {
        while ($row = $news->fetch_assoc()) {
            echo " <div id=\"" . $row['id'] . "\"><h3>" . $row['name'] . "</h3></div>
        <div class=\"invisible_" . $row['id'] . "\" style=\"display: none;\">
        Popis novinky: " .
                $row['text'] . "<br>Level: " . $row['level'] . "<br>Autor questu: " . $row['author']
                . "<br></div>

            <script>
                $(document).ready(function() {
                    $('#" . $row['id'] . "').click(function() {
                        $('.invisible_" . $row['id'] . "').slideToggle(\"fast\");
                    });
                });
            </script>";
        }
    }
        ?>
</div>