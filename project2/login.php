<!--
    login.php - Created/Managed by Lachlan Phillips
-->
<?php include("header.inc");?>
<head>
    <title>VDLS - Login</title>
    <meta name="description" content="Innovative technology solutions! COMPANY NAME is at the forefront of IT.">
</head>
<?php include("nav.inc");?>
<body>

    <div class="site_content site_form_background"> <!--Lachlan - Site content class is like a custom body class for a div in this case-->
        <h1 class = "site_form_title">Login</h1> <!--Title-->
        <form method="post" action= "process_login.php"><!--"http://mercury.swin.edu.au/it000000/formtest.php"--> <!--Post request-->
            <div class="site_form_container">
                <fieldset  class="site_form_container_section">
                    <legend>Details</legend> <!--Name, birthdate-->
                    <p>
                    <label for="login_username">Username</label>     <!--Lachlan- Make sure name only has alphabetical characters with max length of 20-->
                    <input type="text" id="login_username" name="login_username" placeholder="Username" required>
                    </p>
                    <p>
                    <label for="login_password">Password</label>      <!--Lachlan- Make sure name only has alphabetical characters with max length of 20-->
                    <input type="text" id="login_password" name="login_password" placeholder="Password" required>
                    </p>                
                 </fieldset>

                <div class="site_form_submit_area"> <!--For spreading buttons evenly-->
                    <button class="site_form_submit" type="submit">Submit</button>
                </div>
                <p>Don't have an account? <a href="register.php">Register here!</a></p>
            </div>
        </form>
    </div>

<?php include("footer.inc");?>
    
</body>
</html>