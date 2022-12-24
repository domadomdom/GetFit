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
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyInput") {
            echo "<p>Please fill in all fields!</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p>You have submitted your data successfully!</p>";
        } else if ($_GET["error"] == "invalidAge") {
            echo "<p>Please enter a valid age</p>";
        } else if ($_GET["error"] == "invalidWeight") {
            echo "<p>Please enter a valid weight</p>";
        } else if ($_GET["error"] == "invalidHeight") {
            echo "<p>please enter a valid height</p>";
        }
    }
    ?>
</section>
<br>
<section class="set_goal">

    <!-- user inputs his goal and sets a date for it -->
    <div class="container5">
        <br>
        <h2>Set Your Goal</h2>
        <form action="includes/userGoal.inc.php" method="post">
            <input type="number" name="goal" step="0.1" placeholder="Goal in kg..."><br>
            <input type="date" name="date" placeholder="Date..."><br>
            <button type="submit" name="submit">Save</button>
        </form>
    </div>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyInputGoal") {
            echo "<p>Please fill in all fields!</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p>You have submitted your data successfully!</p>";
        } else if ($_GET["error"] == "invalidGoal") {
            echo "<p>Please enter a valid goal</p>";
        }
    }
    // function to display the goal set by the user
    if (isset($_GET["goal"])) {
        if ($_GET["goal"] == "goal") {
            echo "<p>Your goal is to lose " . $_GET["goal"] . " kg by " . $_GET["date"] . "</p>";
        }
    }
    ?>
</section>
<section class="diet-choose">
    <!--user chooses which diet he wants and each choice provides what user should and should not eat-->
    <div class="container6">
        <br>
        <h2>Choose Your Diet</h2>
        <form action="includes/diet.inc.php" method="post">
            <select type="dropdown" name="diet" placeholder="Diet...">
                <option value="Keto">Keto</option>
                <option value="Carnivore">Carnivore</option>
                <option value="Mediterranean">Mediterranean Diet</option>
                <option value="Veganism">Veganism</option>

            </select>
            <br></br>
            <button type="submit" name="submit">Save</button>
        </form>
    </div>
    <?php
    if (isset($_GET["error"]))
        if ($_GET["error"] == "none") {
            echo "<p>You have submitted your data successfully!</p>";
        }

    ?>
    <?php
    // function to display the diet chosen by the user

    if (isset($_GET["diet"])) {
        if ($_GET["diet"] == "Keto") {
            echo "<p>What to eat on a keto diet</p>";
            echo "<p>Meat, fish, eggs, vegetables that grow above ground, nuts and seeds, healthy fats, and oils.</p>";
            echo "<p>What not to eat on a keto diet</p>";
            echo "<p>Grains, legumes, starchy vegetables, fruit, milk, and sugar.</p>";
        } else if ($_GET["diet"] == "Carnivore") {
            echo "<p>What to eat on a carnivore diet</p>";
            echo "<p>Meat, fish, eggs, and dairy products.</p>";
            echo "<p>What not to eat on a carnivore diet</p>";
            echo "<p>Vegetables, fruits, grains, legumes, and sugar.</p>";
        } else if ($_GET["diet"] == "Mediterranean") {
            echo "<p>What to eat on a Mediterranean diet</p>";
            echo "<p>Vegetables, fruits, whole grains, legumes, nuts, seeds, and olive oil.</p>";
            echo "<p>What not to eat on a Mediterranean diet</p>";
            echo "<p>Red meat, processed meat, and sugary drinks.</p>";
        } else if ($_GET["diet"] == "Veganism") {
            echo "<p>What to eat on a vegan diet</p>";
            echo "<p>Vegetables, fruits, whole grains, legumes, nuts, seeds, and olive oil.</p>";
            echo "<p>What not to eat on a vegan diet</p>";
            echo "<p>Meat, fish, eggs, dairy products, and honey.</p>";
        }
    }
    // return the carbs, protein and fat intake for each diet

    if (isset($_GET["diet"])) {
        if ($_GET["diet"] == "Keto") {
            echo "<p>Carbs: 5-10%</p>";
            echo "<p>Protein: 15-20%</p>";
            echo "<p>Fat: 70-75%</p>";
        } else if ($_GET["diet"] == "Carnivore") {
            echo "<p>Carbs: 0%</p>";
            echo "<p>Protein: 20-30%</p>";
            echo "<p>Fat: 70-80%</p>";
        } else if ($_GET["diet"] == "Mediterranean") {
            echo "<p>Carbs: 40-55%</p>";
            echo "<p>Protein: 15-20%</p>";
            echo "<p>Fat: 30-35%</p>";
        } else if ($_GET["diet"] == "Veganism") {
            echo "<p>Carbs: 50-60%</p>";
            echo "<p>Protein: 10-15%</p>";
            echo "<p>Fat: 30-35%</p>";
        }
    }
    // return how much calories the user should eat for each diet

    if (isset($_GET["diet"])) {
        if ($_GET["diet"] == "Keto") {
            echo "<p>Calories: 1200-1500</p>";
        } else if ($_GET["diet"] == "Carnivore") {
            echo "<p>Calories: 1500-1800</p>";
        } else if ($_GET["diet"] == "Mediterranean") {
            echo "<p>Calories: 1500-1800</p>";
        } else if ($_GET["diet"] == "Veganism") {
            echo "<p>Calories: 1500-1800</p>";
        }
    }
    // make user enter his meal for the day

    if (isset($_GET["diet"])) {
        if ($_GET["diet"] == "Keto") {
            echo "<p>Enter your meal for the day</p>";
            echo "<form action='includes/meal.inc.php' method='post'>
            <input type='text' name='meal' placeholder='Meal...'><br>
            <button type='submit' name='submit'>Save</button>
        </form>";
        } else if ($_GET["diet"] == "Carnivore") {
            echo "<p>Enter your meal for the day</p>";
            echo "<form action='includes/meal.inc.php' method='post'>
            <input type='text' name='meal' placeholder='Meal...'><br>
            <button type='submit' name='submit'>Save</button>
        </form>";
        } else if ($_GET["diet"] == "Mediterranean") {
            echo "<p>Enter your meal for the day</p>";
            echo "<form action='includes/meal.inc.php' method='post'>
            <input type='text' name='meal' placeholder='Meal...'><br>
            <button type='submit' name='submit'>Save</button>
        </form>";
        } else if ($_GET["diet"] == "Veganism") {
            echo "<p>Enter your meal for the day</p>";
            echo "<form action='includes/meal.inc.php' method='post'>
            <input type='text' name='meal' placeholder='Meal...'><br>
            <button type='submit' name='submit'>Save</button>
        </form>";
        }
    }
    // get the diet from database and display it

    if (isset($_GET["diet"])) {
        if ($_GET["diet"] == "Keto") {
            echo "<p>Your diet is Keto</p>";
        } else if ($_GET["diet"] == "Carnivore") {
            echo "<p>Your diet is Carnivore</p>";
        } else if ($_GET["diet"] == "Mediterranean") {
            echo "<p>Your diet is Mediterranean</p>";
        } else if ($_GET["diet"] == "Veganism") {
            echo "<p>Your diet is Veganism</p>";
        }
    }

    ?>
    <?php

    ?>
    <br>


</section>
<?php
include_once 'Footer.php';
?>