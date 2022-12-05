<?php 
    include_once 'Header.php';
?>
<?php

?>
<section class="singup-form">
<br>

<div class="container">
    <br>
<h2> Login</h2>
    <form action="includes/login.inc.php" method="post"> 
        <input type="text" name="uid" placeholder="Username/Email..."><br>
        <input type="password" name="pwd" placeholder="Password..."><br>
        <input type="radio" name="userType" value="Trainee"
        class="custum-radio" required>&nbsp; Trainee |
        <input type="radio" name="userType" value="Coach"
        class="custum-radio" required>&nbsp; Coach
        <br>
        
        <button type="submit" name="submit">Log In</button>

    </form>
</div>
    <br>
    <br>
    <br>
    <br>  
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Please fill in all fields!</p>";
        }
        else if($_GET["error"] == "wronglogin"){
            echo "<p>Incorrect login information</p>";
        }
    }
   
?>  
</section>

<?php 
    include_once 'Footer.php';
?>

