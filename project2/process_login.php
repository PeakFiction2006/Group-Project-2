<!--
    process_login.php, created by Lachlan Phillips
-->
<?php
    session_start();
    function login_error_page($message="Invalid Username/Password!")
    {
        include("header.inc");
        include("nav.inc");
        echo('<body>
        <div class="site_content site_form_background"> <!--Lachlan - Site content class is like a custom body class for a div in this case-->
            <br>  
        <div class = "site_form_container">
                <h1>Login Fail!</h1> <!--Title-->    
                <p>'); echo($message); echo ('</p>
                <h2><a href="login.php">Try again</a></h2>
            </div>
        </div>');
        include("footer.inc");
        exit();
    }
    function login_fail()
    {
        if (!isset($_SESSION['login_attempts']))
              $_SESSION['login_attempts'] = 0;

        $_SESSION['login_attempts']++;

        if ($_SESSION['login_attempts'] > 3)
        {
            $_SESSION['login_attempts'] = 0;
            $_SESSION['login_timeout'] = time() + 180;
        }
        //header("Location: login.php");
        //exit();
        login_error_page();
    }

    // If the user is on a login timeout
    if (isset($_SESSION['login_timeout']) && $_SESSION['login_timeout'] > time())
        login_error_page("You have failed the login too many times! Please wait 3 minutes before attempting to log in again!");

    if (!isset($_POST["login_username"]) )// If user fails to provide username
        login_fail();

    if (!isset($_POST["login_password"]) )// If user fails to provide password
        login_fail();

    include("settings.php");

    $name = mysqli_escape_string($conn, $_POST["login_username"]);// ensure the username/pw is SQL query safe
    $pw   = mysqli_escape_string($conn, $_POST["login_password"]);

    unset($_POST["login_username"]);
    unset($_POST["login_password"]);

    $result = $conn->query("SELECT * FROM ACCOUNTS WHERE user_name = '$name' AND user_password = '$pw'");

    if (mysqli_num_rows($result) == 0) // If there's no matching accounts with the exact username and password
        login_fail();

    $_SESSION["user_id"] = $result->fetch_row()[0];

    header("Location: manage.php");
?>