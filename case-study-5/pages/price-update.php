<?php
include 'fetch-prices.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Lighthouse Island Bistro</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/style.css">
  <script type="text/javascript" src="../javascript/menuprice.js"></script>
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
        </nav>
    </div>
    <div id="rightcolumn">
      <div class="content">
        <h2>Coffee at JavaJam</h2>
        <div class="container-menu">
            <form method="POST" action="update-price-submit.php" onsubmit="promptPrices();">
                <table class="table-menu">
                    <tr>
                        <td><input type="checkbox" id="justjava_update" name="justjava_update" onchange="promptPrice('justjava')"></td>
                        <th>Just Java</th>
                        <td>Regular house blend, decaffeinated coffee, or flavour of the day. <br>
                            Endless Cup $<?php echo isset($prices['Just Java']) ? $prices['Just Java'] : '0.00';?>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="cal_update" name="cal_update" onchange="promptPrice('cal')"></td>
                        <th>Cafe au Lait</th>
                        <td>House blended coffee infused into a smooth, steamed milk. <br>
                            Single $<?php echo isset($prices['Cafe au Lait(s)']) ? $prices['Cafe au Lait(s)'] : '0.00'; ?>
                            Double $<?php echo isset($prices['Cafe au Lait(d)']) ? $prices['Cafe au Lait(d)'] : '0.00'; ?>
                        <!-- <b>Single $2.00 Double $3.00</b> -->
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="ic_update" name="ic_update" onchange="promptPrice('ic')"></td>
                        <th>Iced Cappuccino</th>
                        <td>Sweetened espresso blended with icy-cold milk and served in a chilled glass. <br>
                            Single $<?php echo isset($prices['Iced Cappuccino(s)']) ? $prices['Iced Cappuccino(s)'] : '0.00'; ?>
                            Double $<?php echo isset($prices['Iced Cappuccino(d)']) ? $prices['Iced Cappuccino(d)'] : '0.00'; ?>
                        <!-- <b>Single $4.75 Double $5.75</b> -->
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="justjava_price" id="justjava_price">
                <input type="hidden" name="singlePrice" id="singlePrice">
                <input type="hidden" name="doublePrice" id="doublePrice">
                <input type="hidden" name="singlePriceIC" id="singlePriceIC">
                <input type="hidden" name="doublePriceIC" id="doublePriceIC">

                <div class="button-container">
                    <button type="submit" class="update-button">Update Price</button> <!-- Update Price Button -->
                </div>
            </form>
            <script type="text/javascript" src="../javascript/menu_events.js"></script>
            <script>
                function promptPrices() {
                    let justJavaPrice, singlePriceCal, doublePriceCal, singlePriceIC, doublePriceIC;

                    if (document.getElementById('justjava_update').checked) {
                        justJavaPrice = prompt("Enter new price for Just Java:");
                        document.getElementById('justjava_price').value = justJavaPrice;
                    }

                    if (document.getElementById('cal_update').checked) {
                        singlePriceCal = prompt("Enter new price for Cafe au Lait (Single):");
                        doublePriceCal = prompt("Enter new price for Cafe au Lait (Double):");
                        document.getElementById('singlePrice').value = singlePriceCal;
                        document.getElementById('doublePrice').value = doublePriceCal;
                    }

                    if (document.getElementById('ic_update').checked) {
                        singlePriceIC = prompt("Enter new price for Iced Cappuccino (Single):");
                        doublePriceIC = prompt("Enter new price for Iced Cappuccino (Double):");
                        document.getElementById('singlePriceIC').value = singlePriceIC;
                        document.getElementById('doublePriceIC').value = doublePriceIC;
                    }
                }
            </script>
        </div>
      </div>
    </div>
    <footer>Copyright &copy; 2014 JavaJam Coffee House
      <br><small><b><a href="mailto:me@hotmail.com">samantha@chang.com</a></b></small>
    </footer>
</body>

</html>