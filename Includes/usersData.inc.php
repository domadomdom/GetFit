<?php

if (isset($_POST["submit"])) {
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $gender = $_POST['gender'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputData($age, $weight, $height, $gender) != false) {
        header("location: ../index.php?error=emptyInput");
        exit();
    }

    if (invalidAge($age) !== false) {
        header("location: ../index.php?error=invalidAge");
        exit();
    }
    if (invalidWeight($weight) !== false) {
        header("location: ../index.php?error=invalidWeight");
        exit();
    }
    if (invalidHeight($height) !== false) {
        header("location: ../index.php?error=invalidHeight");
        exit();
    }
    createData($conn, $age, $weight, $height, $gender);
} else {
    header("location: ../usersData.php");
    exit();
}
