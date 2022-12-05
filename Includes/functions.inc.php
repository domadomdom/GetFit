<?php


function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat, $userType){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat) || empty($userType)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function UidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn, $name, $email, $username, $pwd, $userType) {
    $sql = "INSERT INTO users(usersName, usersEmail, usersUid, usersPwd, userType) VALUES(?, ?, ?, ?, ?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $username, $hashedPwd, $userType);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function longinUser($conn, $username, $pwd, $userType){
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];

            header("location: ../index.php"); 

            exit();
            
    }
}

function emptyInputData($age, $weight, $height, $gender){
    $result;
    if(empty($age) || empty($weight) || empty($height) || empty($gender)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function createData($conn, $age, $weight, $height, $gender) {
    $sql = "INSERT INTO usersData(userAge, userWeight, userHeight, userGender) VALUES(?, ?, ?, ?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $age, $weight, $height, $gender);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}
function invalidAge($age) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $age)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidWeight($weight) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $weight)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}function invalidHeight($height) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $height)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
