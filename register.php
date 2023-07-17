<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $balance = 0; // Set the initial balance to 0

    // Perform validation
    if (empty($username) || empty($password)) {
        // Invalid input
        echo 'Please fill in all fields';
        // You can also redirect back to the registration page with an error message
        // header('Location: register.html?error=Please fill in all fields');
        // exit();
    } else {
        // Save the new user's information to a text file
        $userFile = fopen('user.txt', 'a');
        if ($userFile) {
            // Append the new user's information to the file
            fwrite($userFile, $username . ':' . $password . ':' . $balance . PHP_EOL);
            fclose($userFile);

            // Registration successful
            // Redirect to success page or login page
            header('Location: success.php');
            exit();
        } else {
            // Unable to open file for writing
            echo 'Unable to register at the moment. Please try again later.';
        }
    }
}
?>
<!-- Add any HTML code for the registration page here if needed -->