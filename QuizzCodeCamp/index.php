<link rel="stylesheet" href="./source/css/index.css">
<?php
    include "./utils/functions.php";
    include "./model/model_quizz.php";
    $bdd = DBconnect();
    $quizzList = quizzAll($bdd);
    include "./view/header.php";
    include "./view/viewIndex.php";
    include "./view/footer.php";
?>