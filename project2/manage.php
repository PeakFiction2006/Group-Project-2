<?php
    session_start();
    if (!isset($_SESSION["user_id"])) // Ensure we're logged in!
    {
        header("Location: login.php");
        exit();
    }
?>
<?php include("header.inc");?>
<head>
    <title>VDLS - Manager Page</title>
    <meta name="description" content="Innovative technology solutions! COMPANY NAME is at the forefront of IT.">
</head>
<?php include("nav.inc");?>
<body>
<div class="site_content">
   
           <div class="site_form_container">
                <form method="post">
                    <fieldset class="site_form_container_section">
                        <legend>List all EOIs</legend>
                        <!--This button queries then prints a table of all the EOI *matthew-->
                        <button type="submit" name="list_all_EOI" value="list_all_EOI">Request</button>
                    </fieldset>
                </form>

                <form method="post">
                <fieldset class="site_form_container_section">
                    <legend>Search EOI by Reference</legend>
                    <!--This button compares the job reference number then prints the one with the same as inputed *matthew-->
                    <p>
                        <label for="search_position">Reference No.:</label>
                        <input type="text" name="search_position" id="search_position">
                        <input type="submit" name="submit" value="Search">  
                    </p>
                </fieldset>
                </form>
                <form method="post">
                <fieldset class="site_form_container_section">  
                    <legend>Search EOI by Name</legend>    
                    <!--This button finds a particular applicant by using their name *matthew-->
                    <p>
                        <label>First Name: </label><input type="text" name="search_name_first"><br>
                        <label>Last Name: </label><input type="text" name="search_name_last">
                        <input type="submit" name="submit" value="Search">  
                    </p>
                </fieldset>
                </form>
                
                <form method="post">
                    <fieldset class="site_form_container_section">
                        <!--This button finds the EOI record with the same job reference number and deletes it from the database *matthew-->
                        <legend>Delete all applications with Job Reference ID:</legend>
                        <p>
                            <label for="delete_position">Reference No.:</label>
                            <input type="text" name="delete_position" id="delete_position">
                        </p>
                        <br>
                        <input type="submit" name="submit" value="Delete">  
                    </fieldset>
                </form>

                <form method="post">
                    <fieldset class="site_form_container_section">
                        <legend>Update status</legend>
                        <!--This button finds the job reference number to change the status of an EOI reocrd *matthew-->
                        <label for="status_update">EOI Number</label>
                        <p>
                        <input type="text" name="status_update" id="status_update">
                     
                        <input type="radio" name="status" id="status" value="New">New
                        <input type="radio" name="status" id="status" value="Current" checked>Current
                        <input type="radio" name="status" id="status" value="Final">Final
                        </p>
                        <br>
                        <input type="submit" name="submit" value="Set Status">  
                    </fieldset>
                </form>
            </div>
        </form>
        <br>
<?php

function print_eoi_row($row)
{
    echo("<tr>");
    foreach($row as $item)
        print("<td>" . $item . "</td>");
    echo("</tr>");
}
function print_eoi_table($result)
{
    echo "<table border='1' cellspacing='0' cellpadding='5'>";
    echo "<tr>
            <th>EOI Number</th>
            <th>Status</th>
            <th>Job Ref</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthdate</th>
            <th>Gender</th>
            <th>Street</th>
            <th>Suburb</th>
            <th>State</th>
            <th>Postcode</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Skills</th>
            <th>Other Skills</th>
            </tr>";
    while ($row = mysqli_fetch_row($result))
    {
        print(print_eoi_row($row));
    }
    echo("</table>");
}
require_once "settings.php"; 
// This code lists and prints all EOI's into a table
if (isset($_POST['list_all_EOI']) && $_POST["list_all_EOI"] == "list_all_EOI")
{
    unset($_POST['list_all_EOI']);

    $query = "SELECT * FROM EOI";
    $result = $conn->query($query);

    if (!$result)
    {
        echo "<p>Error executing query.</p>";
        exit();
    }
    if (mysqli_num_rows($result) == 0) {
        echo "<p>There are no EOIs to display.</p>";
        return;
    }

    print_eoi_table(($result));
}


// This code compares the job reference no. then decides whether to print it into a table
if (isset($_POST['search_position'])) {
    $jobref = mysqli_real_escape_string($conn, $_POST['search_position']); 
    unset($_POST['search_position']);
    $sql = "SELECT * FROM EOI WHERE jobref LIKE '$jobref'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0)
    {
        echo "🚫 No matching job reference number found.";
        return;
    }
    print_eoi_table($result);
}


//This code compares the first & last name then prints out that EOI
if (isset($_POST['search_name_first']) && isset($_POST['search_name_last'])){

    $name_first = mysqli_real_escape_string($conn, $_POST['search_name_first']); 

    $sql = "SELECT * FROM EOI WHERE name_first LIKE '%$name_first%'";

    if (isset($_POST['search_name_last']))
    {
        $name_last = mysqli_real_escape_string($conn, $_POST['search_name_last']);
        $sql .= "AND name_last LIKE '%$name_last%'";
    }
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        print_eoi_table($result);
    } else {
        echo "🚫 No matching applicant found.<br>";
    }
}

//This code finds the EOI with the same job reference number and deletes the record from the database
if (isset($_POST['delete_position'])) {

    $jobref = mysqli_real_escape_string($conn, $_POST['delete_position']);
    unset($_POST["delete_position"]);
    $sql = "DELETE FROM EOI WHERE jobref LIKE '%$jobref%'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "<p>Error executing delete query: " . mysqli_error($conn) . "</p>";
        return;
    }
    if (mysqli_affected_rows($conn) > 0) {
        echo "EOIs with Job Reference '$jobref' have been deleted.";
    } else {
        echo "🚫 No EOIs found with Job Reference '$jobref'.<br>";
    }
}


//This code updates the status of EOI based on the 
if (isset($_POST['status_update'])) {
    if ($conn){
        
        $eoiid = mysqli_real_escape_string($conn, $_POST['status_update']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        unset($_POST['status_update']);
        $sql = "UPDATE EOI SET eoi_status = '$status' WHERE eoi_number = $eoiid";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_affected_rows($conn) > 0) {
            echo "Status for EOI number '$eoiid' updated to '$status'.";
        } else {
            echo "🚫 No EOI found. Nothing changed.<br>";
        }

        mysqli_close($conn);
    } else {
        echo "<p>Unable to connect to the database.</p>";
    }
}


?>

</div>
</body>
</html>