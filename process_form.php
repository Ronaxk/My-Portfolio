<?php
// Database configuration
$host = 'localhost';
$username = 'root@';
$password = '';
$dbname = 'my_contact_form_db'; // The name of the database you created

// Establish a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $message = $_POST["Message"];

    // Prepare the SQL statement to insert data into the table
    $sql = "INSERT INTO contact_form_data (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully
        echo "Thank you! Your form has been submitted successfully.";
    } else {
        // If there's an error in the query
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
