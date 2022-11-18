<?php 
    include_once 'Header.php';
?>


<section class="singup-form">
<br>

<div class="container">
    <br>
<h2>Sign Up</h2>
    <form action="includes/singup.inc.php" method="post"> 
        <input type="text" name="name" placeholder="Full Name..."><br>
        <input type="text" name="email" placeholder="Email..."><br>
        <input type="text" name="uid" placeholder="Username..."><br>
        <input type="password" name="pwd" placeholder="Password..."><br>
        <input type="password" name="pwdrepeat" placeholder="Repeat Password..."><br>
        <button type="submit" name="submit">Sign Up</button>

    </form>
</div>
    <br>
    <br>
    <br>
    <br>    
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyInput"){
            echo "<p>Please fill in all fields!</p>";
        }
        else if($_GET["error"] == "invalidUid"){
            echo "<p>Please choose a proper username</p>";
        }
        else if($_GET["error"] == "invalidEmail"){
            echo "<p>Please choose a proper email</p>";
        }
        else if($_GET["error"] == "passwordsDontMatch"){
            echo "<p>Passwords dont match!</p>";
        }
        else if($_GET["error"] == "stmtfailed"){
            echo "<p>Something went wrong, try again!</p>";
        }
        else if($_GET["error"] == "usernameTaken"){
            echo "<p>Username already taken!</p>";
        }
        else if($_GET["error"] == "none"){
            echo "<p>You have signed up successfully!</p>";
        }
        
    }
?>
</section>


<?php 
    include_once 'Footer.php';
?>

