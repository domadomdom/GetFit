<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>MDR</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">

    </head>
    <body style="background:#474647">
        <nav>
            <ul>
            <?php
                    if(isset($_SESSION["useruid"])){
                        echo "<li><a href='profile.php'>Profile page</a></li>";
                        echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
                    }
                    else{
                        echo "<li><a href='signup.php'>Sign up</a></li>";
                        echo "<li><a href='login.php'>Log In</a></li>";                       
                    }
                ?>
                <li><a href="index.php">GetFit</a></li>
          
                <li><a href="aboutus.php">About Us</a></li>
                <li class="active"><a href="index.php">Home</a></li>

                <lil><img src="https://i.im.ge/2022/11/01/2Kj46z.Picture1.png" style="width:58px; float:left;"></lil>

            </ul>
        </nav>