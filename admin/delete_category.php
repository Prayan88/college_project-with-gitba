<?php
include('../database/connect.php'); // Ensure the database connection is included

if (isset($_GET['delete_category'])) {
    // Sanitize the input to avoid SQL injection
    $delete_id = intval($_GET['delete_category']); // Use intval to ensure it's an integer

    // Prepare the delete query
    $stmt = $con->prepare("DELETE FROM `categories` WHERE category_id = ?");
    $stmt->bind_param("i", $delete_id);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "<script>window.alert('Category deleted successfully');</script>";
        echo "<script>window.open('index.php?view_categories','_self');</script>";
    } else {
        // If there's an error, display the error message
        echo "<script>window.alert('Error deleting category: " . $stmt->error . "');</script>";
    }

    // Close the statement
    $stmt->close();
}
?>
