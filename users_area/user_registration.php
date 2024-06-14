<?php
include('../database/connect.php');

include('../functions/common_functions.php');
session_start();

// Function to sanitize user inputs
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if (isset($_POST['user_register'])) {
    $user_username = sanitizeInput($_POST['user_username']);
    $user_email = sanitizeInput($_POST['user_email']);
    $user_password = sanitizeInput($_POST['user_password']);
    $conf_user_password = sanitizeInput($_POST['conf_user_password']);
    $user_address = sanitizeInput($_POST['user_address']);
    $user_mobile = sanitizeInput($_POST['user_mobile']);
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // Validate passwords match
    if ($user_password !== $conf_user_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // Check if user already exists
        $select_query = "SELECT * FROM `user_table` WHERE username='$user_username' OR user_email='$user_email'";
        $select_result = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($select_result);

        if ($rows_count > 0) {
            echo "<script>alert('Username or Email already exists');</script>";
        } else {
            // Hash the password
            $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

            // Move uploaded file
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");

            // Insert user data into database
            $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_mobile')";
            $insert_result = mysqli_query($con, $insert_query);

            if ($insert_result) {
                echo "<script>alert('User added successfully');</script>";
                header('Location: user_login.php');
                exit;
            } else {
                echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce User Registration Page</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <style>
        .form-label.required::after {
            content: " *";
            color: red;
        }
    </style>
</head>
<body>
    <div class="register">
        <div class="container py-3">
            <h2 class="text-center mb-4">New User Registration</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-4">
                        <!-- username field -->
                        <div class="form-outline">
                            <label for="user_username" class="form-label required">Username</label>
                            <input type="text" placeholder="Enter your username" autocomplete="off" required="required" name="user_username" id="user_username" class="form-control">
                        </div>
                        <!-- email field -->
                        <div class="form-outline">
                            <label for="user_email" class="form-label required">Email</label>
                            <input type="email" placeholder="Enter your email" autocomplete="off" required="required" name="user_email" id="user_email" class="form-control">
                        </div>
                        <!-- image field -->
                        <div class="form-outline">
                            <label for="user_image" class="form-label required">User Image</label>
                            <input type="file" required="required" name="user_image" id="user_image" class="form-control">
                        </div>
                        <!-- password field -->
                        <div class="form-outline">
                            <label for="user_password" class="form-label required">Password</label>
                            <input type="password" placeholder="Enter your password" autocomplete="off" required="required" name="user_password" id="user_password" class="form-control">
                        </div>
                        <!-- confirm password field -->
                        <div class="form-outline">
                            <label for="conf_user_password" class="form-label required">Confirm Password</label>
                            <input type="password" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_user_password" id="conf_user_password" class="form-control">
                        </div>
                        <!-- address field -->
                        <div class="form-outline">
                            <label for="user_address" class="form-label required">Address</label>
                            <input type="text" placeholder="Enter your address" autocomplete="off" required="required" name="user_address" id="user_address" class="form-control">
                        </div>
                        <!-- mobile field -->
                        <div class="form-outline">
                            <label for="user_mobile" class="form-label required">Mobile</label>
                            <input type="text" placeholder="Enter your mobile" autocomplete="off" required="required" name="user_mobile" id="user_mobile" class="form-control">
                        </div>
                        <div>
                            <input type="submit" value="Register" class="btn btn-primary mb-2" name="user_register">
                            <p>
                                Already have an account? <a href="user_login.php" class="text-primary text-decoration-underline"><strong>Login</strong></a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script>
        // Apply the required class to all labels of required fields
        document.querySelectorAll('.form-control[required]').forEach(function(input) {
            var label = input.previousElementSibling;
            if (label && label.classList.contains('form-label')) {
                label.classList.add('required');
            }
        });
    </script>
</body>
</html>
