<?php
/*
 * James Motherwell
 * 4/11/2024
 * 328/icecream/process.php
 * Process order for ice cream shop
 */

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

// Define constants
define("PRICE_PER_SCOOP", 2.00);
define("SALES_TAX", 0.08);

// Include header
$title = "Order summary";
include "header.php";
?>

<body>
<div class="container">
    <h1>Thank you for your order!</h1>
    <?php
//        echo "<pre>";
//        var_dump($_POST);
//        echo "</pre>";

        // Get data from post array
        $cone = $_POST["cone"];
        $numScoops = $_POST["scoops"];
        $flavors = $_POST["flavor"];
        $flavorList = implode(", ", $flavors);

        // Make sure flavors do not exceed scoops
        if (sizeof($flavors) > $numScoops) {
            echo "<h2>Oops! You have more flavors than scoops.</h2>";
            return;
        }

        $subTotal = $numScoops * PRICE_PER_SCOOP;
        $total = $subTotal + $subTotal * SALES_TAX;

        echo "<p>Cone: $cone</p>";
        echo "<p>Number of scoops: $numScoops</p>";
        echo "<p>Flavors: $flavorList</p>";

        echo "<p>Subtotal: $" . number_format($subTotal, 2) . "</p>";
        echo "<p>Total: $" . number_format($total, 2) . "</p>";
    ?>
</div>
</body>