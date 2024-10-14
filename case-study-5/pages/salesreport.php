<?php
include 'generate-sales.php'; // Include the separate file that contains the report logic
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Lighthouse Island Bistro</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div id="wrapper">
    <header>
      <img src="../assets/header.png" width="550" height="100">
    </header>
    <div id="leftcolumn">
      <nav>
            <a href="../pages/homepage.html">Home</a>
            <a href="../pages/menu.php">Menu</a>
            <a href="../pages/music.html">Music</a>
            <a href="../pages/jobs.html">Jobs</a>
            <a href="../pages/price-update.php">Update</a>
            <a href="../pages/salesreport.php">Sales</a>
        <nav>
    </div>
    <div id="rightcolumn">
      <div class="content">
      <h2>Click to generate sales report:</h2>&nbsp;

        <!-- Display Tables if sales data is available -->
        <?php if (isset($salesData)): ?>
          <!-- Table 1: By Product -->
          <h4><u>Total Dollar Sales and Quantity Sales by Product:</u></h4>
          <table class="table-menu">
            <tr>
              <th>Product</th>
              <th>Total Dollar Sales</th>
              <th>Quantity Sales</th>
            </tr>
            <?php foreach ($salesData['byProduct'] as $item): ?>
              <tr>
                <td><?= htmlspecialchars($item['coffee']); ?></td>
                <td><?= number_format($item['totalSales'], 2); ?></td>
                <td><?= $item['totalQuantity']; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>

          <!-- Table 2: By Category -->
          <h4><u>Total Dollar Sales and Quantity Sales by Category:</u></h4>
          <table class="table-menu">
            <tr>
              <th>Category</th>
              <th>Total Dollar Sales</th>
              <th>Quantity Sales</th>
            </tr>
            <?php foreach ($salesData['byCategory'] as $item): ?>
              <tr>
                <td><?= $item['category'] !== null ? htmlspecialchars($item['category']) : "NULL"; ?></td>
                <td><?= number_format($item['totalSales'], 2); ?></td>
                <td><?= $item['totalQuantity']; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        <?php endif; ?>

        <!-- Best Selling product -->
        <?php if (isset($bestSellingData['product']) && $bestSellingData['product'] !== ""): ?>
          <h4><u>Best-Selling Product:</u> 
              <?= htmlspecialchars($bestSellingData['product']); ?>
              <?php if (isset($bestSellingData['category']) && $bestSellingData['category'] !== ""): ?>
                  <?= " (" . htmlspecialchars($bestSellingData['category']) . ")"; ?>
              <?php endif; ?>
          </h4>
        <?php endif; ?>
        <form method="POST" action="">
          <div class="button-container-sales">
            <button class="update-button" type="submit">Generate Sales Report</button>
          </div>
        </form>
      </div>
    </div>
    <footer>Copyright &copy; 2014 JavaJam Coffee House
      <br><small><b><a href="mailto:me@hotmail.com">samantha@chang.com</a></b></small>
    </footer>
</body>
</html>