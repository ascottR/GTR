<?php
session_start();

if (isset($_SESSION['customer_id '])) {
    // User is logged in
    $user_info = array('email' => $_SESSION['email']);  // You can customize this based on your user data
    echo json_encode(array('status' => 'logged_in', 'user' => $user_info));
} else {
    // User is not logged in
    echo json_encode(array('status' => 'not_logged_in'));
}
?>
  