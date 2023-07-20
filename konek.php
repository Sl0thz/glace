<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Name = $_POST["Name"];
    $Phone = $_POST["PhoneNumber"];
    $Email = $_POST["Email"];
    $Message = $_POST["Message"];

    $host = 'localhost';
    $database = 'ecalg';
    $username = 'root';
    $password = '';

    try {
        // Create a new PDO instance
        $pdo = new PDO("mysql:host=$host; dbname=$database", $username, $password);

        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement
        $stmt = $pdo->prepare("INSERT INTO contact (Name, PhoneNumber, Email, Message) VALUES (:Name, :PhoneNumber, :Email, :Message)");

        // Bind parameters to the prepared statement
        $stmt->bindParam(':Name', $Name, PDO::PARAM_STR);
        $stmt->bindParam(':PhoneNumber', $Phone, PDO::PARAM_STR);
        $stmt->bindParam(':Email', $Email, PDO::PARAM_STR);
        $stmt->bindParam(':Message', $Message, PDO::PARAM_STR);

        // Execute the prepared statement
        $stmt->execute();

        // Close the database connection
        $pdo = null;

        // Display a thank you message
        echo "<h2>Thank you for your submission, $Name!</h2>";
        echo "<p>We have received your message and saved it to the database:</p>";
        echo "<p><strong>Name:</strong> $Name</p>";
        echo "<p><strong>Phone Number:</strong> $Phone</p>";
        echo "<p><strong>Email:</strong> $Email</p>";
        echo "<p><strong>Message:</strong> $Message</p>";

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    header("Location: index.html");
    exit();
}
?>

<?php

?>

