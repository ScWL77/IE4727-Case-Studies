function roundTwoDecimal(number) {
    return (Math.round(number * 100) / 100).toFixed(2);
}

// Function to calculate subtotal for each drink and total of everything
function updatePrice() {

    console.log("Update Price function called"); // Add this line

    // JUST JAVA CALCULATION
    const jjQty = document.getElementById('jj_quantity').value;
    const jjPrice = parseFloat(document.getElementById('jj_price').innerHTML);

    let jjSubtotal = jjQty * jjPrice;
    let jjSubtotalRounded = roundTwoDecimal(jjSubtotal);
    
    document.getElementById("jj_subtotal").innerHTML = "$" + jjSubtotalRounded;

    // CAFE AU LAIT CALCULATION
    const calQty = document.getElementById('cal_quantity').value;
    let calPrice = 0; 
    
    if (document.getElementById("cal_single").checked) {
        calPrice = parseFloat(document.getElementById('cal_single_price').innerHTML);
    } else {
        calPrice = parseFloat(document.getElementById('cal_double_price').innerHTML);
    }
    
    let calSubtotal = calQty * calPrice;
    let calSubtotalRounded = roundTwoDecimal(calSubtotal);
    
    document.getElementById("cal_subtotal").innerHTML = "$" + calSubtotalRounded;

    // ICED CAPPUCCINO CALCULATION
    const icQty = document.getElementById('ic_quantity').value;
    let icPrice = 0; 
    
    if (document.getElementById("ic_single").checked) {
        icPrice = parseFloat(document.getElementById('ic_single_price').innerHTML);
    } else {
        icPrice = parseFloat(document.getElementById('ic_double_price').innerHTML);
    }
    
    let icSubtotal = icQty * icPrice;
    let icSubtotalRounded = roundTwoDecimal(icSubtotal);
    
    document.getElementById("ic_subtotal").innerHTML = "$" + icSubtotalRounded;

    // TOTAL PRICE OF EVERYTHING CALCULATION
    let total = roundTwoDecimal(
        jjSubtotal + 
        calSubtotal + 
        icSubtotal
    );
    document.getElementById("total_price").innerHTML = "$" + total;
}