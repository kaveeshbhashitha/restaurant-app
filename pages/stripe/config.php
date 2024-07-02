<?php 
// Product Details 
// Minimum amount is $0.50 US 
// Test Stripe API configuration 

define('STRIPE_API_KEY', 'sk_test_51NHnWuSCKBfIrcyXwCr4xfCHmluqrABBmnYVIrUb5THCneO8jGlcFjOisxovzAiun9tssDqKe0tfwzKQCbv64FOe00KnoL3VTD');  
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51NHnWuSCKBfIrcyXTDjnlJ02Q1NrzvaXIcxUYJnMzxhs6m3YlOI6086oNufEMnQd76GPnFYFp3F4tpj74rShq3lH00L3MDtZ5i'); 

define('STRIPE_SUCCESS_URL', 'http://localhost/restaurant-app/pages/stripe/success.php'); 
define('STRIPE_CANCEL_URL', 'http://localhost/restaurant-app/pages/stripe/cancel.php'); 

// Database configuration   
define('DB_SERVER', 'localhost');  
define('DB_USERNAME', 'root');  
define('DB_PASSWORD', '');  
define('DB_NAME', 'restaurant'); 
?>
