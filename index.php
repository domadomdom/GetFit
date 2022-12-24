<?php
include_once 'Header.php';
?>
<div class="homepage">
    <h1 class="title1">welcome to GetFit</h1>
    <p class="description"> here we will begin to discuss how you can he healthy and in good shape</p>
    <?php
    if (isset($_SESSION["useruid"])) {
        echo "<p>Hello there, " . $_SESSION["useruid"] . "</p>";


        include_once 'usersData.php';
    } else {
    }
    ?>

</div>


<?php
include_once 'Footer.php';
?>