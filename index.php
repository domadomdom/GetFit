<?php 
    include_once 'Header.php';
?>
<div class="homepage">
<?php
                    if(isset($_SESSION["useruid"])){
                        echo "<li><a href='profile.php'>Profile page</a></li>";
                        echo "<p>Hello there, ".$_SESSION["useruid"]."</p>";
                    }
                    else{
                        echo "<li><a href='signup.php'>Sign up</a></li>";
                        echo "<li><a href='login.php'>Log In</a></li>";                       
                    }
                ?>
    <h1 class="title1">welcome to GetFit</h1>
    <p class="description"> here we will begin to discuss how you can he healthy and in good shape</p>
</div>


<?php 
    include_once 'Footer.php';
?>
