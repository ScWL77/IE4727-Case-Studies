<?php
include 'fetch-prices.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Lighthouse Island Bistro</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../case-study-5/css/style.css">
  <script type="text/javascript" src="../case-study-5/javascript/menuprice.js"></script>
</head>

<body>
  <div id="wrapper">
    <header>
      <img src="../case-study-5/assets/header.png" width="550" height="100">
    </header>
    <div id="leftcolumn">
      <nav>
        <a href="../case-study-5/pages/homepage.html">Home</a>
        <a href="../case-study-5/pages/menu.php">Menu</a>
        <a href="../case-study-5/pages/music.html">Music</a>
        <a href="../case-study-5/pages/jobs.html">Jobs</a>
        <a href="../case-study-5/pages/price-update.php">Update</a>
        <a href="../case-study-5/pages/salesreport.php">Sales</a>
      <nav>
    </div>
    <div id="rightcolumn">
      <div class="content">
        <!-- Display success message as an alert -->
         <?php
         $orderSuccess = isset($_GET['orderSuccess']);
         $orderFailed = isset($_GET['orderFailed']);
         ?>
        <?php if ($orderSuccess): ?>
          <div class="success">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
              <strong>Success!</strong> Your order has been placed successfully!
          </div>
        <?php elseif ($orderFailed): ?>
          <div class="alert error">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
              <strong>Error!</strong> There was an issue placing your order. Please try again.
          </div>
        <?php endif; ?>
        <h2>Coffee at JavaJam</h2>
        <div class="container-menu">
        <form method="POST" action="submit-order.php">
            <table class="table-menu">
              <tr>
                <th>Just Java</th>
                <td>Regular house blend, decaffeinated coffee, or flavour <br> of the day. <br>
                  Endless Cup $<span id="jj_price"><?php echo isset($prices['Just Java']) ? $prices['Just Java'] : '0.00';?></span>
                </td>
                <td headers="quantity" id="table-thirdcol">
                  <label for="jj_quantity"><strong>Quantity:</strong></label>
                  <input type="number" id="jj_quantity" name="jj_quantity" step="1" min="0" value="0">
                </td>
                <td headers="quantity" class="table-fourthcol" id="jj_subtotal">
                    $0.00
                </td>
              </tr>
              <tr>
                <th>Cafe au Lait</th>
                <td>House blended coffee infused into a smooth, steamed milk. <br>
                  <!-- <b>Single $2.00 Double $3.00</b> -->
                  <input type="radio" id="cal_single" name="cafe_au_lait_price" value="single" checked>
                  <label for="cal_single">Single $<span id="cal_single_price"><?php echo isset($prices['Cafe au Lait(s)']) ? $prices['Cafe au Lait(s)'] : '0.00'; ?></span></label>
                  <input type="radio" id="cal_double" name="cafe_au_lait_price" value="double">
                  <label for="cal_double">Double $<span id="cal_double_price"><?php echo isset($prices['Cafe au Lait(d)']) ? $prices['Cafe au Lait(d)'] : '0.00'; ?></span></label>
                </td>
                <td headers="quantity" id="table-thirdcol">
                  <label for="quantity"><strong>Quantity:</strong></label>
                  <input type="number" id="cal_quantity" name="cal_quantity" step="1" min="0" value="0">
                </td>
                <td headers="quantity" class="table-fourthcol" id="cal_subtotal">
                    $0.00
                </td>
              </tr>
              <tr>
                <th>Iced Cappuccino</th>
                <td>Sweetened espresso blended with icy-cold milk and <br>
                  served in a chilled glass. <br>
                  <!-- <b>Single $4.75 Double $5.75</b> -->
                  <input type="radio" id="ic_single" name="espresso_price" value="single" checked>
                  <label for="ic_single">Single $<span id="ic_single_price"><?php echo isset($prices['Iced Cappuccino(s)']) ? $prices['Iced Cappuccino(s)'] : '0.00'; ?></span></label>
                  <input type="radio" id="ic_double" name="espresso_price" value="double">
                  <label for="ic_double">Double $<span id="ic_double_price"><?php echo isset($prices['Iced Cappuccino(d)']) ? $prices['Iced Cappuccino(d)'] : '0.00'; ?></span></label>
                </td>
                <td headers="quantity" id="table-thirdcol">
                  <label for="quantity"><strong>Quantity:</strong></label>
                  <input type="number" id="ic_quantity" name="ic_quantity" step="1" min="0" value="0">
                </td>
                <td headers="quantity" class="table-fourthcol" id="ic_subtotal">
                    $0.00
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td id="table-thirdcol">
                  Total price
                </td>
                <td class="table-fourthcol" id="total_price">$0.00</td>
              </tr>
            </table>
            <div class="button-container">
                <button type="submit" class="update-button">Checkout</button> <!-- Checkout Button -->
            </div>
        </form>
        <script type="text/javascript" src="../case-study-5/javascript/menu_events.js"></script>
        </div>
      </div>
    </div>
    <footer>Copyright &copy; 2014 JavaJam Coffee House
      <br><small><b><a href="mailto:me@hotmail.com">samantha@chang.com</a></b></small>
    </footer>
</body>

</html>