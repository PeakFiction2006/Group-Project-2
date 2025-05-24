<!-- 
    process_eoi.php
    Created by Lachlan Phillips
-->
<?php
    function cancelRequest($reason="Unknown ") // Utility for exiting out of an invalid / successful request
    {
        include("header.inc");
        include("nav.inc");

        echo('<h1>Error! Invalid input!</h1>');

        echo("<h2>Error message: ");
        echo(isset($reason) ? $reason : "Undefined");

        echo('</h2><br>
        <h1><a href="apply.php">Retry!</a></h2>');
        
        include("footer.inc");
        exit();
    }

    function validateName($name) // https://www.w3schools.com/php/php_form_url_email.asp
    {
        return (preg_match("/^[a-zA-Z-' ]*$/", $name) != 0);
    }

    function validateDate($date, $format = 'Y-m-d') // https://www.php.net/manual/en/function.checkdate.php
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    function toSQLString($val) // Just format the value to have '' surrounding it if it's a string
    {
        if (is_array($val))
            return toSQLString(join(", ", $val));
        if (!is_string($val))
            return strval($val);
        return "'". strval($val) . "'";
    }

?>

<?php
    include_once("settings.php");

    $httpToSqlMap = array( // Map the HTTP request keys to the SQL table keys, saves some lines of code later on
        "jobref" => "jobref",
        "detail_name_first" => "name_first",
        "detail_name_last" => "name_last",
        "detail_birthdate" => "birthdate",
        "detail_gender" => "gender",
        "detail_location_street" => "addr_street",
        "detail_location_suburbtown" => "addr_suburb",
        "detail_location_state" => "addr_state",
        "detail_location_postcode" => "addr_postcode",
        "detail_contact_email" => "contact_email",
        "detail_contact_phone" => "contact_phone",
        "detail_skill" => "skills",
        "detail_skill_other" => "skills_other"
    );
    $sqlValues = array();

    foreach( $httpToSqlMap as $key => $val)
    {
        if (!isset($_POST[$key])) // If any of these aren't set, cancel!
            cancelRequest("Missing input " . $key);
        
        if (is_string($_POST[$key]) && $_POST[$key] == "")
        {
            if ($key != "detail_skill_other")
                cancelRequest("Missing input " . $key);
            $_POST[$key] = "Undefined";
        }

        if (is_array($_POST[$key])) // If array, validate each of the values inside of it
        {
            $sqlValues[$val] = array();

            foreach($_POST[$key] as $itemkey => $itemval)
                $sqlValues[$val][$itemkey] = mysqli_real_escape_string($conn, $itemval); // make the value SQL query safe

            unset($_POST[$key]);
            continue;
        }
       
        $sqlValues[$val] = mysqli_real_escape_string($conn, $_POST[$key]); // make the value SQL query safe
        unset($_POST[$key]);
    }

    $validJobs = array(
        "NAXG2",
        "SE7M5",
        "SAH05"
    );
    // Check the job reference is correct
    if (!in_array($sqlValues["jobref"], $validJobs))
        cancelRequest("Invalid Job Reference Number!");

    // Check names contains only A-Za-z
    if (!validateName($sqlValues["name_first"]) || !validateName($sqlValues["name_last"]))
        cancelRequest("Invalid Name! Contains non-letters!");

    // Ensure length of names are not above 20
    if (strlen($sqlValues["name_first"]) > 20 || strlen($sqlValues["name_last"]) > 20)
        cancelRequest("Invalid Name! More than 20 characters!");

    // Check birthdate is a valid date
    if (!validateDate($sqlValues["birthdate"])) 
        cancelRequest("Invalid date for birthday!");
    
    // Check gender is one of the defined options
    if ($sqlValues["gender"] != "Male" &&
        $sqlValues["gender"] != "Female" &&
        $sqlValues["gender"] != "Other")
        cancelRequest("Undefined Gender!");


    // Ensure length of address details are not above 40
    if (strlen($sqlValues["addr_street"]) > 40 || strlen($sqlValues["addr_suburb"]) > 40)
        cancelRequest("Street / Suburb / Town name too long!");

    $validAddresses = array(
        "VIC",
        "NSW",
        "QLD",
        "NT",
        "WA",
        "SA",
        "TAS",
        "ACT"
    );

    // If the state is invalid / Not in the state list
    if (!in_array($sqlValues["addr_state"], $validAddresses))
        cancelRequest("Invalid State!");

    // If the post code isn't a number
    if (preg_match("(^[0-9]+)", $sqlValues["addr_postcode"]) == 0 || strlen(strval($sqlValues["addr_postcode"])) > 4)
        cancelRequest("Invalid Postcode!");

    // Convert postcode to number
    $sqlValues["addr_postcode"] = intval($sqlValues["addr_postcode"]);
    
    // Check the emails valid
    if (!filter_var($sqlValues["contact_email"], FILTER_VALIDATE_EMAIL))
        cancelRequest("Invalid E-mail!");
    
    // Check phone number valid
    if (!preg_match("(^[0-9]+)", $sqlValues["contact_phone"]) || strlen($sqlValues["contact_phone"]) > 12 || strlen($sqlValues["contact_phone"]) < 8)
        cancelRequest("Invalid Phone Number!");

    $validSkills = array(
        "Programming",
        "MySQL",
        "Html",
        "Teamwork",
    );

    // Check the skill is in the skills list
    foreach($sqlValues["skills"] as $key=>$val)
        if (!in_array($val, $validSkills))
            cancelRequest("Invalid Skill!");

    

    $query = "INSERT INTO eoi (eoi_status, ";

    $lastkey = array_key_last($sqlValues);
    foreach($sqlValues as $key=>$val)
        $query .= $key . ($lastkey  != $key ? ", " : "");

    $query .= ") VALUES ('New', ";
    foreach($sqlValues as $key=>$val)
    {
        $query .= toSQLString($val);
        $query .= ($lastkey  != $key ? ", " : "");
    }

    $query .= ")";

    $conn->query($query);
    header("Location: apply_success.php");
?>