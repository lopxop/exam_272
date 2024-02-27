<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "library_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_GET['query'];

$sql = "SELECT * FROM books WHERE title LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Title: " . $row["title"]. "<br>";
        echo "Author ID: " . $row["authorid"]. "<br>";
        echo "ISBN: " . $row["ISBN"]. "<br>";
        echo "Publication Year: " . $row["pub_year"]. "<br>";
        echo "Available: " . $row["available"]. "<br><br>";
    }
} else {
    echo "No results found";
}
$conn->close();
?>
