<?php
    session_start();
    function login_fail()
    {
        header("Location: login.php");
        exit();
    }

    if (!isset($_POST["login_username"]) )
        login_fail();

    if (!isset($_POST["login_password"]) )
        login_fail();

    include("settings.php");

    $name = mysqli_escape_string($conn, $_POST["login_username"]);
    $pw   = mysqli_escape_string($conn, $_POST["login_password"]);
    unset($_POST["login_username"]);
    unset($_POST["login_password"]);

    $result = $conn->query("SELECT * FROM ACCOUNTS WHERE user_name = '$name' AND user_password = '$pw'");

    if (mysqli_num_rows($result) == 0)
        login_fail();

    $_SESSION["user_id"] = $result->fetch_row()[0];

    header("Location: manage.php");
?>