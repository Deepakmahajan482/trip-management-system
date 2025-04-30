<?php
$login=false;
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the name from form
  $searchName = $_POST['name'];

  // Sanitize input to prevent SQL injection (better use prepared statements in production)
  $searchName = mysqli_real_escape_string($con, $searchName);
  $pass = mysqli_real_escape_string($con, $_POST['pass']);

  // Check both username and password
  $sql = "SELECT * FROM login_page WHERE name = '$searchName' AND password = '$pass'";
  $result = mysqli_query($con, $sql);

  // Check if found
  if (mysqli_num_rows($result) > 0) {
    header("Location: fetch_data.php");
    exit();
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <style>
    img{
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;  /* Makes the image behave like a background */
  z-index: -1;        /* Puts it behind the content */
  opacity: 0.7;   
}
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      /* background: linear-gradient(to right, #6a11cb, #2575fc); */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background-color: white;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      width: 300px;
      text-align: center;
    }

    .login-container h2 {
      margin-bottom: 20px;
      color: #333;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #2575fc;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1em;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #1a5cd8;
    }

  
  </style>
</head>
<body>
<img class="bg" src="dd.webp" alt="AGC" srcset="">
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST">
      <input type="text" placeholder="Username" name="name" required />
      <input type="password" placeholder="Password" name="pass"required />
      <button type="submit">Login</button>
    </form>
    
  </div
