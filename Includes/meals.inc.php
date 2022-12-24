<?php

if (isset($_POST["submit"])) {
    $meal = $_POST['meal'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (emptyInputMeal($meal) != false) {
        header("location: ../index.php?error=emptyInputMeal");
        exit();
    }


    createMeal($conn, $meal);
} else {
    header("location: ../usersData.php");
    exit();
}
