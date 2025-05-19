<!--
    apply.html - Managed by Lachlan Phillips
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VDLS - Application Portal</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="icon" href="../images/icon.png">     <!--Logo source https://www.freeimages.com/vector/generic-logo-4846322-->
    <meta name="author" content="Matthew, Marcus and Lachlan ">
    <meta name="keywords" content="HTML, Javascript, IT, Website, Business, Programming, Code, Web Design">
    <meta name="description" content="Innovative technology solutions! COMPANY NAME is at the forefront of IT.">
</head>
<body>
<?php include("header.inc");?>
<?php include("menu.inc");?>

    <div class="site_content site_form_background"> <!--Lachlan - Site content class is like a custom body class for a div in this case-->
        <h1 class = "site_form_title">Apply now!</h1> <!--Title-->
        <form method="post" action= "process_eoi.php" novalidate=”novalidate”><!--"http://mercury.swin.edu.au/it000000/formtest.php"--> <!--Post request-->
            <div class="site_form_container">
                <!--<legend>Job Application Form</legend> --> <!--Legend here is a bit unessecary and confusing looking-->
                <fieldset class="site_form_container_section"> <!--List of Job References to select from-->
                    <legend>Job Reference Number</legend>
                    <select id="jobref" name="jobref" required>
                        <option value="">Please Select</option>
                        <option value="NAXG2">NAXG2 - Network Administrator</option>
                        <option value="SE7M5">SE7M5 - Systems Engineer</option>
                        <option value="SAH05">SAH05 - Security Analyst</option>
                    </select>
                </fieldset>
                <fieldset  class="site_form_container_section">
                    <legend>Details</legend> <!--Name, birthdate-->
                    <p>
                    <label for="detail_name_first">First Name</label>     <!--Lachlan- Make sure name only has alphabetical characters with max length of 20-->
                    <input type="text" id="detail_name_first" name="detail_name_first" pattern="(^[A-Za-z]+)" maxlength="20" placeholder="First Name" required>
                    </p>
                    <p>
                    <label for="detail_name_last">Last Name</label>      <!--Lachlan- Make sure name only has alphabetical characters with max length of 20-->
                    <input type="text" id="detail_name_last" name="detail_name_last" pattern="(^[A-Za-z]+)" maxlength="20" placeholder="Last Name" required>
                    </p>
                    
                    <label for="detail_birthdate">Birthdate</label>
                    <input type="date" id="detail_birthdate" name="detail_birthdate" required>
                </fieldset>

                <fieldset class="site_form_container_section">                       
                    <legend>Gender</legend> <!--Lachlan - Select gender radio buttons-->
                    <p>
                        <input type="radio" value="Male" id="gender_m" name="detail_gender" required>
                        <label for="gender_m">Male</label>
                        
                        <input type="radio" value="Female" id="gender_f" name="detail_gender">
                        <label for="gender_f">Female</label>

                        <input type="radio" value="Other" id="gender_o" name="detail_gender">
                        <label for="gender_o">Other</label>
                    </p>
                </fieldset>

                <fieldset class="site_form_container_section">
                    <legend>Location</legend>
                    <p>
                        <label for="detail_location_street">Street</label> <!--Street-->
                        <input type="text" id="detail_location_street" name="detail_location_street" maxlength="40" required>
                    </p>
                    <p>
                        <label for="detail_location_suburbtown">Suburb/Town</label> <!--Lachlan - Suburb-->
                        <input type="text" id="detail_location_suburbtown" name="detail_location_suburbtown" maxlength="40" required>
                    </p>
                    <p>
                        <label for="detail_location_state">State</label> <!--Lachlan - State selection-->
                        <select id="detail_location_state" name="detail_location_state" required>
                            <option value="">Please Select</option> <!--Drop down selection-->
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </p>
                    <p>
                        <label for="detail_location_postcode">Postcode</label> <!-- Lachlan - Postcode check, ensure length equals 4, and all digits are numbers-->
                        <input type="text" id="detail_location_postcode" name="detail_location_postcode" minlength="4" maxlength="4" min="200" max="9944" placeholder="0000" pattern="^[0-9]{4}" required>
                    </p>
                </fieldset>

                <fieldset  class="site_form_container_section"> <!--Lachlan - Contact details-->
                    <legend>Contact Details</legend>
                    <p>
                        <label for="detail_contact_email">Email</label>
                        <!--Email Regex Pattern: https://stackoverflow.com/questions/5601647/html5-email-address-input-pattern-attribute -->
                        <input type="text" id="detail_contact_email" name="detail_contact_email" required pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="someone@something.com">
                    </p>
                    <p>
                        <label for="detail_contact_phone">Phone Number (No Spaces)</label>        <!--Lachlan - Make sure number only has numbers, and is between 8 and 12 characters long-->
                        <input type="text" id="detail_contact_phone" name="detail_contact_phone" maxlength="12" pattern="^[0-9]{8,12}$" required placeholder="0498099099">
                    </p>
                </fieldset>

            
                <fieldset  class="site_form_container_section">
                    <legend>Required Technical List</legend> <!--Lachlan - Generic skills check list-->
                    <ol>
                        <li>
                            <input id="skill0" type="checkbox" name="detail_skill[]" value="Programming" checked required>
                            <label for="skill0">Basic programming knowledge in JavaScript and PHP.</label>
                        </li>
                        <li>
                            <input id="skill1" type="checkbox" name="detail_skill[]" value="MySQL">
                            <label for="skill1">Able to use MySQL Databases.</label>
                        </li>
                        <li>
                            <input id="skill2" type="checkbox" name="detail_skill[]" value="Html">
                            <label for="skill2">Able to use HTML and CSS.</label>
                        </li>
                        <li>
                            <input id="skill4" type="checkbox" name="detail_skill[]" value="Teamwork">
                            <label for="skill4">Team Worker</label>
                        </li>
                    </ol>
                </fieldset>

                <fieldset  class="site_form_container_section">
                    <legend>Other Skills</legend>
                    <textarea id="detail_skill_other" name="detail_skill_other" placeholder="Type any other skill sets you have"></textarea>  
                </fieldset>

                <br>

                <div class="site_form_submit_area"> <!--For spreading buttons evenly-->
                    <!--Submit / Reset buttons, with css classes to define their appearance-->
                    <input class="site_form_submit" type="submit" name="Submit">
                    <input class="site_form_reset" type="reset" name="Reset">
                </div>
            </div>
        </form>
    </div>

<?php include("footer.inc");?>
    
</body>
</html>