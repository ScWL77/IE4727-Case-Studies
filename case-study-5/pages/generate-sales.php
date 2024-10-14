<?php

include "dbconnect.php";

function generateSalesReport($conn) {

    // Query for total sales and quantity by coffee product
    $productQuery = "
        SELECT coffee, SUM(sales) AS totalSales, SUM(quantity) AS totalQuantity
        FROM orders
        GROUP BY coffee
        ORDER BY FIELD(coffee, 'Just Java', 'Cafe au Lait', 'Iced Cappuccino')
    ";

    $productResult = mysqli_query($conn, $productQuery);

    // Check for errors in the product query
    if (!$productResult) {
        die("Product query failed: " . mysqli_error($conn));
    }

    $byProduct = [];
    while ($row = mysqli_fetch_assoc($productResult)) {
        $byProduct[] = $row; // Add results to the array
    }

    // Query for total sales and quantity by category
    $categoryQuery = "
        SELECT NULLIF(category, '') AS category, SUM(sales) AS totalSales, SUM(quantity) AS totalQuantity
        FROM orders
        GROUP BY category
        ORDER BY FIELD(category, '', 'single', 'double')
    ";
    $categoryResult = mysqli_query($conn, $categoryQuery);

    // Check for errors in the category query
    if (!$categoryResult) {
        die("Category query failed: " . mysqli_error($conn));
    }

    $byCategory = [];
    while ($row = mysqli_fetch_assoc($categoryResult)) {
        $byCategory[] = $row; // Add results to the array
    }

    return ['byProduct' => $byProduct, 'byCategory' => $byCategory]; // Return structured data
}

function getBestSellingProductAndCategory($conn) {
    // Query for the best-selling coffee product
    $bestSellingProductQuery = "
        SELECT coffee, category
        FROM orders
        GROUP BY coffee, category
        ORDER BY SUM(quantity) DESC
        LIMIT 1
    ";

    $bestSellingProductResult = mysqli_query($conn, $bestSellingProductQuery);
    
    // Check for errors
    if (!$bestSellingProductResult) {
        die("Best-selling product query failed: " . mysqli_error($conn));
    }

    // Fetch the result
    $bestSellingProduct = mysqli_fetch_assoc($bestSellingProductResult);

    // Check if a best-selling product was found
    if ($bestSellingProduct) {
        return [
            'product' => $bestSellingProduct['coffee'],
            'category' => $bestSellingProduct['category'] ?? 'N/A'  // Use 'N/A' if no category is found
        ];
    }

    return null; // Return null if no product found
}

// Initialize variables for sales data and best-selling data
$salesData = null;
$bestSellingData = null;

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $salesData = generateSalesReport($conn); // Call the function from the separate file
    $bestSellingData = getBestSellingProductAndCategory($conn); // Call to get the best selling product
}

// Close the database connection
$conn->close();
?>