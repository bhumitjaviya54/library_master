<?php
// Database connection parameters

use LDAP\Result;

$servername = "localhost";
$BookID = "root";
$Bookname = "";
$dbname = "library_master";

// Create connection
$conn = new mysqli($servername, $BookID, $Bookname, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select records from LIBRARY_MASTER table
$sql = "SELECT `BookID`, `Bookname`, `Price` FROM `library_master`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>";
    echo "<tr><th>BookId</th><th>Bookname</th><th>Price</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["BookID"] . "</td><td>" . $row['Bookname'] . "</td><td>" . $row["Price"] . "</td></tr>";
    }
    echo "<table>";
} 
else {
    echo "0 Result";
}
// Close connection
$conn->close();
?>