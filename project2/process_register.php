<!--
    process_register.php, created by Lachlan Phillips
-->
<?php
    session_start();
    function register_error_page($message="Missing Username/Password")
    {
        include("header.inc");
        include("nav.inc");
        echo('<body>
        <div class="site_content site_form_background"> <!--Lachlan - Site content class is like a custom body class for a div in this case-->
            <br>  
        <div class = "site_form_container">
                <h1>Registration Fail!</h1> <!--Title-->    
                <p>'); echo($message); echo ('</p>
                <h2><a href="register.php">Try again</a></h2>
            </div>
        </div>');
        include("footer.inc");
        exit();
    }

    if (!isset($_POST["reg_username"]) ) // check user provided a username
        register_error_page();

    if (!isset($_POST["reg_password"]) )// check user provided a password
        register_error_page();

    include("settings.php");

    $name = mysqli_escape_string($conn, $_POST["reg_username"]); // ensure values are SQL query safe
    $pw   = mysqli_escape_string($conn, $_POST["reg_password"]);

    unset($_POST["reg_username"]);
    unset($_POST["reg_password"]);

    $result = $conn->query("SELECT * FROM ACCOUNTS WHERE user_name = '$name'");

    if (mysqli_num_rows($result) > 0) // Abort if there are any accounts with the same username
        register_error_page("An account called $name already exists!");
        
    $result = $conn->query("INSERT INTO ACCOUNTS (user_name, user_password) VALUES ('$name', '$pw')");

    if (!$result) // Catch SQL error
        register_error_page( mysqli_error($conn));

    include("header.inc");
    include("nav.inc");
    echo('<body>
    <div class="site_content site_form_background"> <!--Lachlan - Site content class is like a custom body class for a div in this case-->
        <br>  
    <div class = "site_form_container">
            <h1>Registration Success!</h1> <!--Title-->    
            <p>Your account was successfully created!</p>
            <h2><a href="login.php">Login to your account here!</a></h2>
        </div>
    </div>');
    include("footer.inc");
    exit();
?>