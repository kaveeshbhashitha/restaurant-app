<?php 

$db_conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME); 
// Display error if failed to connect 
if ($db_conn->connect_errno) { 
    printf("Connect failed: %s\n", $db_conn->connect_error); 
    exit(); 
}
?>