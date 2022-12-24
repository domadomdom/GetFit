<?php

if (isset($_POST["submit"])) {
    $goal = $_POST['goal'];
    $date = $_POST['date'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (emptyInputGoal($goal, $date) != false) {
        header("location: ../index.php?error=emptyInputGoal");
        exit();
    }
    if (invalidGoal($goal) !== false) {
        header("location: ../index.php?error=invalidGoal");
        exit();
    }

    createGoal($conn, $goal, $date);
} else {
    header("location: ../usersData.php");
    exit();
}
