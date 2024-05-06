<?php
if (isset($_POST['name'], $_POST['email'], $_POST['contact-number'], $_POST['address'], $_POST['payment-method'], $_POST['pin-number']) && !empty($_POST['name'])) {
    // Assign POST data to variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contact-number'];
    $address = $_POST['address'];
    $paymentMethod = $_POST['payment-method'];
    $hashedPin = hash('sha256', $_POST['pin-number']);

    // Output the received data for debugging
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Contact Number: $contactNumber<br>";
    echo "Address: $address<br>";
    echo "Payment Method: $paymentMethod<br>";
    echo "Hashed PIN: $hashedPin<br>";

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'web');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO payment (name, email, contact_number, address, payment_method, hashed_pin) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            echo "Error: " . $conn->error;
            die();
        }

        // Bind parameters and execute statement
        $stmt->bind_param("ssssss", $name, $email, $contactNumber, $address, $paymentMethod, $hashedPin);
        $execval = $stmt->execute();
        if (!$execval) {
            echo "Error: " . $stmt->error;
            die();
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();

        // Redirect to home.html after successful registration
        header("Location: home.html");
        exit(); // Ensure script execution stops after redirection
    }
} else {
    // Handle the case where required POST variables are missing or empty
    echo "Error: Required POST variables 'name', 'email', 'contact-number', 'address', 'payment-method', and 'pin-number' are missing or empty.";
}
?>
