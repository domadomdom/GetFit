<?php


// <!-- function that calculates carbs in a meal -->

function calculateCarbs($meal)
{
    $carbs = 0;
    foreach ($meal as $item) {
        $carbs += $item->getCarbs();
    }
    return $carbs;
}

// <!-- function that calculates protein in a meal -->


function calculateProtein($meal)
{
    $protein = 0;
    foreach ($meal as $item) {
        $protein += $item->getProtein();
    }
    return $protein;
}

// <!-- function that calculates fat in a meal -->


function calculateFat($meal)
{
    $fat = 0;
    foreach ($meal as $item) {
        $fat += $item->getFat();
    }
    return $fat;
}

// <!-- function that calculates calories in a meal -->



function calculateCalories($meal)
{
    $calories = 0;
    foreach ($meal as $item) {
        $calories += $item->getCalories();
    }
    return $calories;
}

// <!-- function that calculates the total cost of a meal -->



function calculateCost($meal)
{
    $cost = 0;
    foreach ($meal as $item) {
        $cost += $item->getCost();
    }
    return $cost;
}

// <!-- function that calculates the total weight of a meal -->


function calculateWeight($meal)
{
    $weight = 0;
    foreach ($meal as $item) {
        $weight += $item->getWeight();
    }
    return $weight;
}

// <!-- function that calculates the total weight of a meal in grams -->



function calculateWeightInGrams($meal)
{
    $weight = 0;
    foreach ($meal as $item) {
        $weight += $item->getWeightInGrams();
    }
    return $weight;
}

// <!-- function that calculates the total weight of a meal in ounces -->


function calculateWeightInOunces($meal)
{
    $weight = 0;
    foreach ($meal as $item) {
        $weight += $item->getWeightInOunces();
    }
    return $weight;
}

// <!-- function that calculates the total weight of a meal in pounds -->


function calculateWeightInPounds($meal)
{
    $weight = 0;
    foreach ($meal as $item) {
        $weight += $item->getWeightInPounds();
    }
    return $weight;
}

// <!-- function that calculates the total weight of a meal in kilograms -->


function calculateWeightInKilograms($meal)
{
    $weight = 0;
    foreach ($meal as $item) {
        $weight += $item->getWeightInKilograms();
    }
    return $weight;
}
// function that creates a meal of chicken, beef, eggs, or fish

function createMeal($meals)
{
    $meal = readline("What meal would you like to create? Chicken, Beef, Eggs, or Fish? ");
    $meal = strtolower($meal);
    if ($meal == "chicken") {
        $meal = $meals[0];
    } elseif ($meal == "beef") {
        $meal = $meals[1];
    } elseif ($meal == "eggs") {
        $meal = $meals[2];
    } elseif ($meal == "fish") {
        $meal = $meals[3];
    } else {
        echo "Please choose a meal from the list. ";
        createMeal($meals);
    }
    return $meal;
}

// function that makes user choose an existing meal of cicken, beef, eggs, or fish

function chooseExistingMeal($meals)
{
    $meal = readline("What meal would you like to choose? Chicken, Beef, Eggs, or Fish? ");
    $meal = strtolower($meal);
    if ($meal == "chicken") {
        $meal = $meals[0];
    } elseif ($meal == "beef") {
        $meal = $meals[1];
    } elseif ($meal == "eggs") {
        $meal = $meals[2];
    } elseif ($meal == "fish") {
        $meal = $meals[3];
    } else {
        echo "Please choose a meal from the list. ";
        chooseExistingMeal($meals);
    }
    return $meal;
}
// function to make user choose from a diet plan


function chooseDietPlan($dietPlans)
{
    $dietPlan = readline("What diet plan would you like to choose? Low Carb, Low Fat, Low Calorie, or High Protein? ");
    $dietPlan = strtolower($dietPlan);
    if ($dietPlan == "low carb") {
        $dietPlan = $dietPlans[0];
    } elseif ($dietPlan == "low fat") {
        $dietPlan = $dietPlans[1];
    } elseif ($dietPlan == "low calorie") {
        $dietPlan = $dietPlans[2];
    } elseif ($dietPlan == "high protein") {
        $dietPlan = $dietPlans[3];
    } else {
        echo "Please choose a diet plan from the list. ";
        chooseDietPlan($dietPlans);
    }
    return $dietPlan;
}

// make function print out the meal


function printMeal($meal)
{
    echo "Meal: " . $meal->getName() . PHP_EOL;
    echo "Carbs: " . $meal->getCarbs() . PHP_EOL;
    echo "Protein: " . $meal->getProtein() . PHP_EOL;
    echo "Fat: " . $meal->getFat() . PHP_EOL;
    echo "Calories: " . $meal->getCalories() . PHP_EOL;
    echo "Cost: $" . $meal->getCost() . PHP_EOL;
    echo "Weight: " . $meal->getWeight() . PHP_EOL;
    echo "Weight in grams: " . $meal->getWeightInGrams() . PHP_EOL;
    echo "Weight in ounces: " . $meal->getWeightInOunces() . PHP_EOL;
    echo "Weight in pounds: " . $meal->getWeightInPounds() . PHP_EOL;
    echo "Weight in kilograms: " . $meal->getWeightInKilograms() . PHP_EOL;
}
