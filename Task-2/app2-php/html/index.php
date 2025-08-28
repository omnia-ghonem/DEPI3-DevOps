<?php
$servername = "mysql-db";
$username = "petclinic ";
$password = "petclinic ";
$dbname = "petclinic";  // Connect to the petclinic database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// SQL query to select specific columns
$sql = "SELECT first_name, last_name, address, city, telephone FROM owner";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data as an HTML table
    echo "<table border='1' cellpadding='5'>";
    echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Telephone</th>
          </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['first_name']) . "</td>
                <td>" . htmlspecialchars($row['last_name']) . "</td>
                <td>" . htmlspecialchars($row['address']) . "</td>
                <td>" . htmlspecialchars($row['city']) . "</td>
                <td>" . htmlspecialchars($row['telephone']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
