<?php
// Include configuration file
require_once 'config.php';
// Include Stripe PHP library
require_once 'stripe-php/init.php';

// Set API key
\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

$response = array(
    'status' => 1,
    'error' => array(
        'message' => 'Request Successfull!'
    )
);

// Check if session_id is provided in the query parameters
if (isset($_GET['session_id'])) {
    $session_id = $_GET['session_id'];
    $getID = $_GET['getID'];

    echo '<h1>Payment success</h1>';
} else {
    echo '<h1>Payment success</h1>';
}


