<!--
    enhancements.php - Managed by Lachlan Phillips
-->
<?php include("header.inc");?>
<head>
    <title>VDLS - Enhancements</title>
    <meta name="description" content="Innovative technology solutions! COMPANY NAME is at the forefront of IT.">
</head>
<?php include("nav.inc");?>

<body>
    <div class="site_content site_form_background"> <!--Lachlan - Site content class is like a custom body class for a div in this case-->
        <h1>Enhancements</h1>

        <div class="site_form_container">
            <div class="site_form_container_section">
                <h2>Manager Login Page</h2>
                <p>Access to the manage.php page is restricted to logged in users. (login.php/process_login.php)<br>The accounts name/password is stored in a table the sql database</p>
                <a href="login.php">Login Page</a>
            </div>
 
            <div class="site_form_container_section">
                <h2>Manager Account Registration Page</h2>
                <p>Allows users to register a manager account.</p>
                <a href="register.php">Register Page</a>
            </div>
  
            <div class="site_form_container_section">
                <h2>Login Timeout on more than 3 Failed attempts</h2>
                <p>Ability to attempt to login is restricted for 3 minutes on 4th failed login attempt.</p>
                <a href="login.php">Login Page</a>
            </div>

            <div class="site_form_container_section">
                <h2>Manager sort order for EOI lists</h2>
                <p>Ability for manager to select what table key to sort the EOI result lists by, along with whether it's descending or ascending order.</p>
                <a href="manage.php">Manage Page</a>
            </div>
        </div>
    </div>

<?php include("footer.inc");?>
    
</body>
</html>