<?php

include "dbconnect.php";

// Function to update price
function updatePrice($conn, $sql, $price) {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("d", $price);
    $stmt->execute();
    $stmt->close();
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update Just Java price
    if (isset($_POST['justjava_update']) && isset($_POST['justjava_price'])) {
        updatePrice($conn, "UPDATE prices SET price = ? WHERE name = 'Just Java'", $_POST['justjava_price']);
    }

    // Update Cafe au Lait prices
    if (isset($_POST['cal_update']) && isset($_POST['singlePrice'], $_POST['doublePrice'])) {
        updatePrice($conn, "UPDATE prices SET price = ? WHERE name = 'Cafe au Lait(s)'", $_POST['singlePrice']);
        updatePrice($conn, "UPDATE prices SET price = ? WHERE name = 'Cafe au Lait(d)'", $_POST['doublePrice']);
    }

    // Update Iced Cappuccino prices
    if (isset($_POST['ic_update']) && isset($_POST['singlePriceIC'], $_POST['doublePriceIC'])) {
        updatePrice($conn, "UPDATE prices SET price = ? WHERE name = 'Iced Cappuccino(s)'", $_POST['singlePriceIC']);
        updatePrice($conn, "UPDATE prices SET price = ? WHERE name = 'Iced Cappuccino(d)'", $_POST['doublePriceIC']);
    }
}

// Fetch updated prices to display
$result = $conn->query("SELECT name, price FROM prices");
$prices = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prices[$row['name']] = $row['price'];
    }
}

header("Location: price-update.php");
exit();
$conn->close();
?>
</html>
