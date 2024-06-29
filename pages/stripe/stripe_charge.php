<?php
// Include configuration file  
require_once 'config.php';
// Include Stripe PHP library 
require_once 'stripe-php/init.php';

// Set API key
\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

$response = array(
    'status' => 0,
    'error' => array(
        'message' => 'Invalid Request!'
    )
);

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $input = file_get_contents('php://input');
    $request = json_decode($input);

    // Check for JSON parsing errors
    if (json_last_error() === JSON_ERROR_NONE) {
        $productName = $request->Name ?? '';
        $productID = $request->ID ?? '';
        $productPrice = $request->Price ?? 0;
        $currency = $request->Currency ?? 'usd';

        // Convert product price to cents
        $stripeAmount = round($productPrice * 100);

        if (!empty($request->checkoutSession)) {
            // Create new Checkout Session for the order
            try {
                $session = \Stripe\Checkout\Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'price_data' => [
                            'product_data' => [
                                'name' => $productName,
                                'metadata' => [
                                    'pro_id' => $productID
                                ]
                            ],
                            'unit_amount' => $stripeAmount,
                            'currency' => $currency,
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => STRIPE_SUCCESS_URL . '?session_id={CHECKOUT_SESSION_ID}&getID=' . $productID,
                    'cancel_url' => STRIPE_CANCEL_URL,
                ]);

                $response = array(
                    'status' => 1,
                    'message' => 'Checkout Session created successfully!',
                    'sessionId' => $session['id']
                );
            } catch (Exception $e) {
                $response = array(
                    'status' => 0,
                    'error' => array(
                        'message' => 'Checkout Session creation failed! ' . $e->getMessage()
                    )
                );
            }
        }
    } else {
        http_response_code(400);
        $response['error']['message'] = 'Invalid JSON payload.';
    }
} else {
    http_response_code(405); // Method Not Allowed
    $response['error']['message'] = 'Request method not allowed.';
}

// Return response
header('Content-Type: application/json');
echo json_encode($response);
?>
