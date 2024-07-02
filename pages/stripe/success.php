<?php
    include '../config.php';
    
    $id = $_GET['getID'];
    $session_id = $_GET['session_id'];

    $total = 1;
    $result = mysqli_query($link, "SELECT * FROM foodorder WHERE id = $id");
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
    <title>Success</title>
    <meta charset="utf-8">
    <!-- Stylesheet file -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../icons/restaurant.png" type="image/x-icon">
</head>
<body class="App">
    <div class="success" id="printableArea">
        <h3 class="topic">Order payment is success | Payment Infor</h3>
        <div class="wrapper">
            <?php if(!empty($id)){ ?>
                <p><b>Reference Number:</b> <?php echo $id; ?></p>
                <p><b>Transaction ID:</b> <?php echo $session_id; ?></p>
                <table>
                    <tr class="thead">
                        <td>id</td>
                        <td>Menu Name</td>
                        <td>Customer Name</td>
                        <td>Number of dishes</td>
                        <td>Price per one</td>
                        <td>Toral</td>
                    </tr>
                    <tr>
                        <td><?php echo $mealid; ?></td>
                        <td><?php echo $menuname; ?></td>
                        <td><?php echo $cusname; ?></td>
                        <td><?php echo $numofdish; ?></td>
                        <td>Rs.<?php echo $price; ?></td>
                        <td>Rs.<?php echo $total; ?>.00</td>
                    </tr>
                </table>
            <?php } ?>
            <div class="right">
                <button class="btn secondary" onclick="navigate()">Back to Manu</button>
                <button class="btn danger" onclick="printDiv('printableArea')">Print Invoice</button>
            </div>
        </div>
    </div>

    <script>
        function navigate(){
            window.location.href = "./../menu.php";
        }


        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
	
</body>
</html>
