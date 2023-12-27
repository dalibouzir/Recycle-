<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function login($email, $userPassword) {
    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $dbname = "webapp";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM logs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    // Check if a user is found and the password matches
    if ($user && password_verify($userPassword, $user['password'])) {
        session_start();

        // Store user data in the session if needed
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to the Forums.php page
        echo "success";
        exit();
    } else {
        // Handle the error, show an error message, or redirect to a login page with an error message
        echo "Invalid email or password.";
    }
}

// Usage example:
if (isset($_POST['email2']) && isset($_POST['password2'])) {
    $email = $_POST['email2'];
    $password = $_POST['password2'];

    login($email, $password);
}
?>