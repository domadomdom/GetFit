<?php

if (isset($_POST["submit"])) {
    $diet = $_POST['diet'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (emptyInputDiet($diet) != false) {
        header("location: ../index.php?error=emptyInputDiet");
        exit();
    }


    createDiet($conn, $diet);
} else {
    header("location: ../usersData.php");
    exit();
}
