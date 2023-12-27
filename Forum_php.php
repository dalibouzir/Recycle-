<?php
// Assuming you have a MySQL database set up

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webapp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['post-title']) && isset($_POST['post-content']) && isset($_POST['post-photo']) && isset($_POST['post-link'])) {
            // Prepare the SQL statement for adding a post
            $postTitle = $_POST['post-title'];
            $postContent = $_POST['post-content'];
            $postPhoto = $_POST['post-photo'];
            $postLink = $_POST['post-link'];
            $postStmt = $conn->prepare("INSERT INTO post (title, content, PHOTO_URL, LINK_URL) VALUES (?, ?, ?, ?)");
            $postStmt->execute([$postTitle, $postContent, $postPhoto, $postLink]);
        }

        if (isset($_POST['event-title']) && isset($_POST['event-description']) && isset($_POST['event-location']) && isset($_POST['event-datetime'])) {
            // Prepare the SQL statement for adding an event
            $eventTitle = $_POST['event-title'];
            $eventDescription = $_POST['event-description'];
            $eventLocation = $_POST['event-location'];
            $eventDatetime = $_POST['event-datetime'];
            echo $eventTitle;
            $eventStmt = $conn->prepare("INSERT INTO events (title, description, location, datetime) VALUES (?, ?, ?, ?)");
            $eventStmt->execute([$eventTitle, $eventDescription, $eventLocation, $eventDatetime]);
        }
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $username = $_POST['username'];
        
            // Check if email already exists
            $stmt = $conn->prepare("SELECT * FROM logs WHERE email = ?");
            $stmt->execute([$email]);
            $existingUser = $stmt->fetch();
        
            if ($existingUser) {
                // Email already exists, display an error message or perform any necessary action
                echo "Email already exists.";
            } else {
                // Email does not exist, proceed with inserting the new record
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        
                $stmt = $conn->prepare("INSERT INTO logs (email, password, username) VALUES (?, ?, ?)");
                $stmt->execute([$email, $hashedPassword, $username]);
            }
        }
    }

    // Redirect back to the admin page after adding the post or event
    // header("Location: myadmin.php");
    exit();
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}


?>