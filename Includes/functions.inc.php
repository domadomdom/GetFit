<?php


function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat, $userType)
{
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat) || empty($userType)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat)
{
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function UidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn, $name, $email, $username, $pwd, $userType)
{
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

function emptyInputLogin($username, $pwd)
{
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function longinUser($conn, $username, $pwd, $userType)
{
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];

        header("location: ../index.php");

        exit();
    }
}

function emptyInputData($age, $weight, $height, $gender)
{
    if (empty($age) || empty($weight) || empty($height) || empty($gender)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function createData($conn, $age, $weight, $height, $gender)
{
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

function emptyInputGoal($goal, $date)
{
    if (empty($goal) || empty($date)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createGoal($conn, $goal, $date)
{
    $sql = "INSERT INTO usersGoal(userGoal, userDate) VALUES(?, ?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $goal, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}
function emptyInputMeal($meal)
{
    if (empty($meal)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createMeal($conn, $meal)
{
    $sql = "INSERT INTO usersMeal(userMeal) VALUES(?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $meal);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}
function emptyInputDiet($diet)
{
    if (empty($diet)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createDiet($conn, $diet)
{
    $sql = "INSERT INTO usersDiet(userDiet) VALUES(?); ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $diet);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}
function invalidAge($age)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $age)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidWeight($weight)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $weight)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidHeight($height)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $height)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidGoal($goal)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $goal)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
if ($gender == $male) {
    $BMR = 66.47 + (13.75 * $weight) + (5.003 * $height) - (6.755 * $age);
}

if ($gender == $male) {
    $BMR = 655.1 + (9.563 * $weight) + (1.850 * $height) - (4.676 * $age);  # kg cm years

}


# Once you get out of bed and begin to move around, you will need to adjust this figure as you expend more energy.
# This value, called active metabolic rate (AMR)
# Sedentary (little or no exercise): AMR = BMR x 1.2
# Lightly active (exercise 1–3 days/week): AMR = BMR x 1.375
# Moderately active (exercise 3–5 days/week): AMR = BMR x 1.55
# Active (exercise 6–7 days/week): AMR = BMR x 1.725
# Very active (hard exercise 6–7 days/week): AMR = BMR x 1.9
$AMR = readline("How Active Are You(chois number) 1- Sedentary (little or no exercise\n2- Lightly active (exercise 1–3 days/week)\n3-Moderately active (exercise 3–5 days/week)\n4-Active (exercise 6–7 days/week)\n5-Very active (hard exercise 6–7 days/week)\n:");
if (($AMR == 1)) {
    $BMR = ($BMR * 1.2);
}
if (($AMR == 2)) {
    $BMR = ($BMRforMale *  1.375);
}
if (($AMR == 3)) {
    $BMR = ($BMRforMale * 1.55);
}
if (($AMR == 4)) {
    $BMR = ($BMRforMale * 1.725);
}
if (($AMR == 5)) {
    $BMR = ($BMRforMale * 1.9);
}

$ratio = [];
echo ("Enter your ratio: carb:\nfat:\nprotein:");
for ($i = 0; $i < 3; $i++) {
    $x = readline();
    $ratio[] = $x;
}
echo ($ratio);
# now we will calculate calories for every thing
$carbPerDayCalories = $BMRforMale * ($ratio[0] / 100);
$fatPerDayCalories = $BMRforMale * ($ratio[1] / 100);
$proteinPerDayCalories = $BMRforMale * ($ratio[2] / 100);



echo '<script type="text/javascript">
       window.onload = function () { alert("Welcome"); } 
</script>';
