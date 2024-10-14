<?php

include "dbconnect.php";

// SQL query to fetch menu prices
$sql = "SELECT name, price FROM prices";
$result = $conn->query($sql);

// Create an array to store prices
$prices = array();

// Fetch and store prices in the array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prices[$row['name']] = $row['price'];
    }
} else {
    echo "No data found";
}

// Close the connection
$conn->close();

?>
