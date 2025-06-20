<?php
session_start();
error_reporting(0);
include('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Basic validation
    if (!empty($name) && !empty($email) && !empty($message)) {
        try {
            $sql = "INSERT INTO contact_messages (name, email, message, created_at) VALUES (:name, :email, :message, NOW())";
            $query = $dbh->prepare($sql);
            $query->bindParam(':name', $name);
            $query->bindParam(':email', $email);
            $query->bindParam(':message', $message);
            $query->execute();

            $_SESSION['msg'] = "Message sent successfully!";
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "All fields are required!";
    }

    header('Location: index.php'); 
}
?>
