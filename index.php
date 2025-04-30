<?php
$insert=false;
if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";
$database = "trip";
$con=mysqli_connect($server,$username,$password,$database);
if(!$con){
  die("connection to this database failed due to ".mysqli_connect_error());
}

$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['desc'];
$sql = "INSERT INTO `trip` (`name`, `email`, `gender`, `age`, `phone`, `des`, `dt`) 
VALUES ('$name', '$email', '$gender', '$age', '$phone', '$other', current_timestamp())";
if ($con->query($sql)==true) {
   $insert=true;
} else {
  echo "ERROR: $sql <br>" . mysqli_error($con);
}
mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Travel Form</title>
  <link rel="stylesheet" href="style.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400..800&family=Roboto:wght@600&family=Sriracha&display=swap');
    </style>
</head>
<body>
  <img class="bg" src="dd.webp" alt="AGC" srcset="">
<div class="container">
  <h1>Welcome to Amritsar group of Colleges,Amritsar</h1>
  <h3>Enter your details and submit this form to confirm your participation in the trip</h3>
  <?php
  if($insert==true){
  echo "<p class='submitmsg'>Thanks for submitting your form.We are happy to see you joining us for the Trip</p>";
  }
  ?>
  <form action="index.php" method="post">
    <input type="text" name="name" id="name" placeholder="enter your name" required>
    <input type="text" name="email" id="email" placeholder="enter your email" required>
    <input type="text" name="gender" id="gender" placeholder="enter your gender" required>
    <input type="" name="age" id="age" placeholder="enter your  age" required>
    <input type="phone" name="phone" id="phone" placeholder="enter your phone" required>
    <textarea name="desc" id="desc" cols="30" rows="5" placeholder="enter any other information here"></textarea>
    <button class="btn">Submit</button>
    

  </form>
</div>
  
</body>
</html>