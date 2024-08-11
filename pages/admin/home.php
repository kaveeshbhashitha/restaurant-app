<?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === TRUE) {
        echo "<script>window.location.href='./login.php';</script>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Calendar</title>
    <link rel="stylesheet" href="../../styles/adminhome.css">
    <link rel="shortcut icon" href="../../icons/restaurant.png" type="image/x-icon">
    <script src="../../scripts/booking.js"></script>
</head>
<body>
    <div class="calendar-container">
        <div>
            <a href="">

            </a><a href=""></a>
        </div>
        <div class="calendar-header">
            <div class="nav-buttons">
                <form method="GET">
                    <input type="hidden" name="month" value="<?php echo date('m', strtotime('-1 month', strtotime($currentMonth))); ?>">
                    <input type="hidden" name="year" value="<?php echo date('Y', strtotime('-1 month', strtotime($currentMonth))); ?>">
                    <button type="submit">Previous</button>
                </form>
                <div class="gap"></div>
                <form method="GET">
                    <input type="hidden" name="month" value="<?php echo date('m', strtotime('+1 month', strtotime($currentMonth))); ?>">
                    <input type="hidden" name="year" value="<?php echo date('Y', strtotime('+1 month', strtotime($currentMonth))); ?>">
                    <button type="submit">Next</button>
                </form>
                <div class="gap"></div>
                <button type="submit" onclick="window.location.href='menus.php'" style="background-color: rgb(40, 40, 40);">Menus</button>
                <div class="gap"></div>
                <button type="submit" onclick="window.location.href='logout.php'" style="background-color: #d70404;">Logout</button>
            </div>
            <?php
                $currentMonth = isset($_GET['month']) && isset($_GET['year']) 
                    ? $_GET['year'] . '-' . $_GET['month'] . '-01' 
                    : date('Y-m-01');

                $currentMonthFormatted = date('F Y', strtotime($currentMonth));
                ?>
                <h2><?php echo $currentMonthFormatted; ?></h2>
        </div>
        <div class="calendar">
            <?php
            require '../config.php';

            $currentMonth = isset($_GET['month']) ? $_GET['year'] . '-' . $_GET['month'] . '-01' : date('Y-m-01');

            $sql = "SELECT * FROM booking WHERE DATE_FORMAT(date, '%Y-%m') = '" . date('Y-m', strtotime($currentMonth)) . "'";
            $result = $link->query($sql);

            $bookings = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $bookings[] = $row;
                }
            }

            $daysInMonth = date('t', strtotime($currentMonth));
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $dayFormatted = str_pad($day, 2, "0", STR_PAD_LEFT);
                $currentDate = date('Y-m', strtotime($currentMonth)) . "-$dayFormatted";

                $dayBookings = array_filter($bookings, function ($booking) use ($currentDate) {
                    return $booking['date'] === $currentDate;
                });

                echo "<div class='day' data-day='$dayFormatted'>";
                echo "<span>$day</span>";

                if (count($dayBookings) > 0) {
                    echo "<div class='text-color'>(" . count($dayBookings) . " Reservations)</div>";
                }

                echo "<div class='booking-info' style='display:none;'>";
                foreach ($dayBookings as $booking) {
                    echo "<p>Booking ID: {$booking['id']}</p>";
                    echo "<p>Table ID: {$booking['tableid']}</p>";
                    echo "<p>Seats: {$booking['seats']}</p>";
                    echo "<p>Condition: {$booking['tcondition']}</p>";
                    echo "<p>Name: {$booking['name']}</p>";
                    echo "<p>Email: {$booking['email']}</p>";
                    echo "<p>Mobile: {$booking['mobile']}</p>";
                    echo "<p>Date: {$booking['date']}</p>";
                    echo "<p>Arrival Time: {$booking['atime']}</p>";
                    echo "<p>Leave Time: {$booking['ltime']}</p>";
                    echo "<p>Number of Customers: {$booking['numofcus']}</p>";
                    echo "<hr>";
                }
                echo "</div>";

                echo "</div>";
            }

            ?>
        </div>
    </div>

    <div id="bookingDetailsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="bookingDetails">
            </div>
        </div>
    </div>
</body>
</html>
