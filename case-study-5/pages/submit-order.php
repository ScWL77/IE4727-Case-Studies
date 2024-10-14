<?php

include "dbconnect.php";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch data from the form
    $jj_quantity = isset($_POST['jj_quantity']) ? (int)$_POST['jj_quantity'] : 0;
    $cal_quantity = isset($_POST['cal_quantity']) ? (int)$_POST['cal_quantity'] : 0;
    $ic_quantity = isset($_POST['ic_quantity']) ? (int)$_POST['ic_quantity'] : 0;

    // Cafe au Lait category (single/double)
    $cal_category = $_POST['cafe_au_lait_price'];
    // Iced Cappuccino category (single/double)
    $ic_category = $_POST['espresso_price'];

    // Define array of coffee types to process
    $coffees = [
        ['name' => 'Just Java', 'quantity' => $jj_quantity, 'category' => ''],
        ['name' => 'Cafe au Lait', 'quantity' => $cal_quantity, 'category' => $cal_category],
        ['name' => 'Iced Cappuccino', 'quantity' => $ic_quantity, 'category' => $ic_category]
    ];

    $orderSuccess = false;
    $orderFail = false;

    foreach ($coffees as $coffee) {
        if ($coffee['quantity'] > 0) { // Only insert if quantity is greater than 0
            $stmt = $conn->prepare("INSERT INTO orders (coffee, category, quantity, sales) VALUES (?, ?, ?, ?)");
            $total_price = getPrice($coffee['name'], $coffee['category']) * $coffee['quantity']; // Calculate total price
            $stmt->bind_param("ssis", $coffee['name'], $coffee['category'], $coffee['quantity'], $total_price);

            if ($stmt->execute()) {
                $orderSuccess = true;
            } else {
                $orderFail = true;
                echo "Error: " . $stmt->error;
            }
        }
    }

    // Redirect to the menu page if order is successful
    if ($orderSuccess && !$orderFailed) {
        header("Location: menu.php?orderSuccess=1"); // Successful order
    } elseif ($orderFailed) {
        header("Location: menu.php?orderFailed=1"); // Error during order processing
    } else {
        header("Location: menu.php"); // If no order was placed (no quantities)
    }
    exit;

}

// Close the connection
$conn->close();

// Helper function to get the price based on coffee and category
function getPrice($coffee_name, $category) {
    // Assuming $prices array comes from `fetch-prices.php`
    include 'fetch-prices.php';
    switch ($coffee_name) {
        case 'Just Java':
            return $prices['Just Java']; // Endless cup
        case 'Cafe au Lait':
            return ($category == 'single') ? $prices['Cafe au Lait(s)'] : $prices['Cafe au Lait(d)'];
        case 'Iced Cappuccino':
            return ($category == 'single') ? $prices['Iced Cappuccino(s)'] : $prices['Iced Cappuccino(d)'];
        default:
            return 0;
    }
}
?>
