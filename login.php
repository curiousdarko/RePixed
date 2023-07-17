<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read the user.txt file
    $userFile = file('user.txt', FILE_IGNORE_NEW_LINES);
    $authenticated = false;

    // Iterate through each line in the file
    foreach ($userFile as $userLine) {
        // Split the line into username, password, and balance
        [$fileUsername, $filePassword, $fileBalance] = explode(':', $userLine);

        // Check if the provided username and password match the line from the file
        if ($username === $fileUsername && $password === $filePassword) {
            // Successful authentication
            $authenticated = true;
            break;
        }
    }

    if ($authenticated) {
        // Redirect to success page
        header('Location: success.php');
        exit();
    } else {
        // Invalid credentials
        echo 'Invalid username or password';
        // You can also redirect back to the login page with an error message
        // header('Location: index.html?error=Invalid credentials');
        // exit();
    }
}
?>
<!-- Add any HTML code for the login page here if needed -->