<?php
$login = false;
$server = "localhost";
$username = "root";
$password = "";
$database = "trip";

// Connect to MySQL
$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize $num_rows variable
$num_rows = 0;
$result = null;

// Check if form is submitted (POST request)

    // Fetch data from the database
    $sql = "SELECT * FROM trip";
    $result = mysqli_query($con, $sql);
    $num_rows = mysqli_num_rows($result); // Get the number of rows

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <style>
  
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: lightblue;
    }

    
    .login-container h2 {
      margin-bottom: 20px;
      color: #333;
    }

  
    
  </style>
</head>
<body>
  <!-- <img class="bg" src="dd.webp" alt="AGC" srcset=""> -->
  <div class="login-container">
    <h2>The Record is :</h2><br><br>
    <?php
    // Check if there are rows to display
    if ($num_rows > 0 && $result) {
        // Loop through each row and display the data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<h3>User Information:</h3>";
            echo "<p><strong>S.No:</strong> " . $row['sno'] . "</p>";
            echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Gender:</strong> " . $row['gender'] . "</p>";
            echo "<p><strong>Age:</strong> " . $row['age'] . "</p>";
            echo "</div><hr>";
        }
    } else {
        // If no records are found
        echo "<p>No records found.</p>";
    }
    ?>
  </div>
</body>
</html>

<?php
// Close the connection
mysqli_close($con);
?>
