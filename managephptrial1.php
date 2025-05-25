<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="description" content="Login Page for manage.php" >
    <meta name="keywords"    content="Login Page for manage.php" >
    <meta name="author"      content="Login Page for manage.php" />
</head>

<body>
    <form action="login.php" method="post">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="Submit">
</form>

<?php
session_start();
require_once("testsettings.php");

$conn = mysqli_connect($host, $username, $password, $database);

//set index to value 0
if(!isset($_SESSION['index'])){
    $_SESSION['index'] = 0;
}

//checks if the submit was pressed
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    //if it goes through check if it has that data in the database, reset index to 0 then redirects the user to manage.php
    if ($user) {
      $_SESSION['username'] = $user['username'];
      $_SESSION['password'] = $user['password'];
      $_SESSION['index'] = 0;
      header("Location: manage.php");
      exit();
    } else { //if it doesnt go through then add 1 to index
      echo ("❌ Incorrect username or password.<br>");
      $_SESSION['index']++;
    }

    if ($_SESSION['index'] >= 3){ //if the index is becomes more than 3 the user is locked out from login for 3 minutes 
        echo ("Too many bad login requests. Cool down period 3min.");
        sleep(180);
        
    }
}
?>

</body>
</html>
