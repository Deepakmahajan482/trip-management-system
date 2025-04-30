<?php
$login=False;
$server = "localhost";
$username = "root";
$password = "";
$database = "trip";

// Connect to MySQL
$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
  // echo "hello";
    die("Connection failed: " . mysqli_connect_error());
}
// echo "hello deepa";
// If the form is submitted, search for the name
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the name from form
    $searchName = $_POST['searchName'];

    // Sanitize input to prevent SQL injection (better use prepared statements in production)
    $searchName = mysqli_real_escape_string($con, $searchName);

    // SQL query to search for the name
    $sql = "SELECT * FROM trip WHERE name = '$searchName'";
    $result = mysqli_query($con, $sql);

    // Check if found
    if (mysqli_num_rows($result) > 0) {
       $login=True;
    } else {
        echo "No record found for '$searchName'";
    }
    mysqli_free_result($result);
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Name</title>
</head>
<body>
  <
    <h1>Search for a Name in the Database</h1>
    <form action="getting_data.php" method="POST">
        Enter Name to Search: <input type="text" name="searchName" required>
        <input type="submit" value="Search">
    </form>
</body>
</html>
