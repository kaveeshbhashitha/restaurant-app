<?php
    require_once 'config.php'; 
    include 'dbConnect.php';

    session_start();

    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
        echo "<script>window.location.href='./../login.php';</script>";
        exit;
    }
    $id = $_GET['id'];
    $total = 1;
    $result = mysqli_query($db_conn, "SELECT * FROM foodorder WHERE id = $id");
    $resultData = mysqli_fetch_assoc($result);

    $menuname = $resultData['menuname'];
    $mealid = $resultData['menuid'];
    $menuimage = $resultData['image'];
    $price = $resultData['price'];
    $cusname = $resultData['name'];
    $numofdish = $resultData['numofdish'];
    $total =  $price * $numofdish;

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Check Out</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../icons/restaurant.png" type="image/x-icon">
    <!-- Stylesheet file -->
    <link href="css/style.css" rel="stylesheet">
    <link href="../../styles/style.css" rel="stylesheet">
    <link href="../../styles/delivery.css" rel="stylesheet">
    <!-- Stripe JavaScript library -->
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="App">

    <div class="message-container">
        <div class="center-content top-content">
            <h2 class="topic">Place your delivery and make payment</h2>
            <h5 class="topic mot">We love deliver your order to your door steps</h5>

            <div class="code-center">
            </div>


            <div class="delivery-box">
                <div class="mot order-details">
                    <div><img src="<?php echo htmlspecialchars($menuimage); ?>" alt="Card Image"></div>
                </div>
                <div>
                    <form class="form" method="post" name="add">
                        <div class="input-group">
                            <label for="email">Order ID</label>
                            <input type="text" class="text-orange" value='Order id is: <?php echo $id ?>'>
                        </div>
                        <div class="input-group">
                            <label for="email">Menu ID</label>
                            <input type="text" class="text-orange" value='Selected menu id is: <?php echo $mealid ?>'>
                        </div>
                        <div class="input-group">
                            <label for="email">Menu name</label>
                            <input type="text" class="text-orange" value='Your selection is: <?php echo $menuname ?>'>
                        </div>
                        <div class="input-group">
                            <label for="email">Number of potions</label>
                            <input type="text" class="text-orange" value='Potion size is: <?php echo $numofdish ?>'>
                        </div>
                        <div class="input-group">
                            <label for="email">Customer name</label>
                            <input type="text" class="text-orange" value='<?php echo $cusname ?>'>
                        </div>
                        <div class="input-group">
                            <label for="email">Total price</label>
                            <input type="text" class="text-orange" value='Rs.<?php echo $total ?>.00'>
                        </div>
                        <div id="buynow">
                            <button class="btn__default submit-button" id="payButton"> Pay Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>	
<script>
var buyBtn = document.getElementById('payButton');
var responseContainer = document.getElementById('paymentResponse');    
// Create a Checkout Session with the selected product
var createCheckoutSession = function (stripe) {
    return fetch("stripe_charge.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            checkoutSession: 1,
			Name:"<?php echo $menuname; ?>",
			ID:"<?php echo $id; ?>",
			Price:"<?php echo $total; ?>.00",
			Currency:"LKR",
        }),
    }).then(function (result) {
        return result.json();
    });
};

// Handle any errors returned from Checkout
var handleResult = function (result) {
    if (result.error) {
        responseContainer.innerHTML = '<p>'+result.error.message+'</p>';
    }
    buyBtn.disabled = false;
    buyBtn.textContent = 'Buy Now';
};

// Specify Stripe publishable key to initialize Stripe.js
var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

buyBtn.addEventListener("click", function (evt) {
    buyBtn.disabled = true;
    buyBtn.textContent = 'Please wait...';
    createCheckoutSession().then(function (data) {
        if(data.sessionId){
            stripe.redirectToCheckout({
                sessionId: data.sessionId,
            }).then(handleResult);
        }else{
            handleResult(data);
        }
    });
});
</script>
</body>
</html>