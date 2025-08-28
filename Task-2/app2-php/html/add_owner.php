<?php
$servername = "mysql-db";
$username = "petclinic";
$password = "petclinic";
$dbname = "petclinic";

// Connect to MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS owners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    telephone VARCHAR(20) NOT NULL
)";
$conn->query($sql);

// Insert owner from form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $telephone = $_POST['telephone'];

    $stmt = $conn->prepare("INSERT INTO owners (first_name, last_name, address, city, telephone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $address, $city, $telephone);
    $stmt->execute();
    $stmt->close();
}

// Redirect to index.php to show all owners
header("Location: /api/index.php");
exit();

$conn->close();
?>
