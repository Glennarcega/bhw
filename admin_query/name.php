<?php
require '../connection/connect.php';

// Check if the session ID is set and not null
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    $query = $conn->query("SELECT * FROM `users` WHERE `id` = '$userId'") or die(mysqli_error($conn));

    // Check if a matching user was found
    if ($query->num_rows > 0) {
        $fetch = $query->fetch_array();
        $name = $fetch['name'];
    } else {
        // Handle the case where no user was found
       
        header("location:../index.php");
    }
} else {
    // Handle the case where the session ID is not set or null
    header("location:../index.php");
}
?>
