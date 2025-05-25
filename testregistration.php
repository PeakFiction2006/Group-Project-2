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
    <form action="update_profile.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="new_password"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    session_start();
    require_once("settings.php");

    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, trim($_POST['username']));
        $new_password = mysqli_real_escape_string($conn, trim($_POST['new_password']));

        //Update database of password and username
        $sql = "UPDATE user SET password ='$new_password' WHERE username ='$username'";

        if (mysqli_query($conn, $sql)) {
            echo ("Registered successfully.");
        } else {
            echo("Error registering.") . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>
