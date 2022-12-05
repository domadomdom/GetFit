<?php 
    include_once 'Header.php';
?>


<section class="userdata-form">
<br>

<div class="container4">
    <br>
<h2>Enter Your Details</h2>
    <form action="includes/usersData.inc.php" method="post"> 
        <input type="number" name="age" step="0.1" placeholder="Age..."><br>
        <input type="number" name="weight" step="0.1" placeholder="Weight in kg..."><br>
        <input type="number" name="height" step="0.1" placeholder="Height in cm..."><br>
        <select type="dropdown" name="gender" placeholder="Gender...">
        <option value="male">Male</option>
        <option value="female">Female</option>

  </select>
<br></br>
        <button type="submit" name="submit">Save</button>

    </form>
</div>
<?php
if(isset($_GET["error"])){
        if($_GET["error"] == "emptyInput"){
            echo "<p>Please fill in all fields!</p>";
        }
        else if($_GET["error"] == "none"){
            echo "<p>You have submitted your data successfully!</p>";
        }
        else if($_GET["error"] == "invalidAge"){
            echo "<p>Please enter a valid age</p>";
        }
        else if($_GET["error"] == "invalidWeight"){
            echo "<p>Please enter a valid weight</p>";
        }
        else if($_GET["error"] == "invalidHeight"){
            echo "<p>please enter a valid height</p>";
        }

        
    }
?>
</section>


<?php 
    include_once 'Footer.php';
?>

