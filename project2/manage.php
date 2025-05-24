<!DOCTYPE html>
<html>
<head>
    <title>Queries</title>
</head>
<body>

<form method="post">
<!--This button queries then prints a table of all the EOI *matthew-->
 <button type="submit" name="list_all_EOI">All EOI</button>


 <!--This button compares the job reference number then prints the one with the same as inputed *matthew-->
<label>Search Position:</label>
    Reference no.: <input type="text" name="search_position"><br>
    <input type="submit">

    
<!--This button finds a particular applicant by using their name *matthew-->
<label>Search Name:</label>
    First Name: <input type="text" name="search_name_first"><br>
    Last Name: <input type="text" name="search_name_last"><br>
    <input type="submit">


<!--This button finds the EOI record with the same job reference number and deletes it from the database *matthew-->
<label>Delete Position:</label>
    Reference no.: <input type="text" name="delete_position"><br>
    <input type="submit">


<!--This button finds the job reference number to change the status of an EOI reocrd *matthew-->
Reference no.: <input type="text" name="status_update"><br>
        <br><br>
        Gender:
        <input type="radio" name="status" value="New">New
        <input type="radio" name="status" value="Current">Current
        <input type="radio" name="status" value="Final">Final
        <br><br>
        <input type="submit" name="submit" value="Submit">  
        <input type="submit">
</form>




<?php

// This code lists and prints all EOI's into a table
if (isset($_POST['list_all_EOI'])) {
    require_once "settings.php"; 

    $dbconn = @mysqli_connect($host, $username, $password , $database);
    if ($dbconn) {
        $query = "SELECT * FROM EOI";
        $result = mysqli_query($dbconn, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1' cellspacing='0' cellpadding='5'>";
                echo "<tr>
                        <th>EOI Number</th>
                        <th>Status</th>
                        <th>Job Ref</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Street</th>
                        <th>Suburb</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Skills</th>
                        <th>Other Skills</th>
                      </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['eoi_number'] . "</td>";
                    echo "<td>" . $row['eoi_status'] . "</td>";
                    echo "<td>" . $row['jobref'] . "</td>";
                    echo "<td>" . $row['name_first'] . "</td>";
                    echo "<td>" . $row['name_last'] . "</td>";
                    echo "<td>" . $row['addr_street'] . "</td>";
                    echo "<td>" . $row['addr_suburb'] . "</td>";
                    echo "<td>" . $row['addr_state'] . "</td>";
                    echo "<td>" . $row['addr_postcode'] . "</td>";
                    echo "<td>" . $row['contact_email'] . "</td>";
                    echo "<td>" . $row['contact_phone'] . "</td>";
                    echo "<td>" . $row['skills'] . "</td>";
                    echo "<td>" . $row['skills_other'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>There are no EOIs to display.</p>";
            }
        } else {
            echo "<p>Error executing query.</p>";
        }

        mysqli_close($dbconn);
    } else {
        echo "<p>Unable to connect to the database.</p>";
    }
}



// This code compares the job reference no. then decides whether to print it into a table
if (isset($_GET['search_position'])) {
    require_once "settings.php"; 

    $jobref = mysqli_real_escape_string($conn, $_GET['search_position']); 

    $sql = "SELECT * FROM EOI WHERE jobref LIKE '%$jobref%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
            <th>EOI Number</th>
            <th>Status</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Street</th>
            <th>Suburb</th>
            <th>State</th>
            <th>Postcode</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Skills</th>
            <th>Other Skills</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['eoi_number'] . "</td>";
            echo "<td>" . $row['eoi_status'] . "</td>";
            echo "<td>" . $row['name_first'] . "</td>";
            echo "<td>" . $row['name_last'] . "</td>";
            echo "<td>" . $row['addr_street'] . "</td>";
            echo "<td>" . $row['addr_suburb'] . "</td>";
            echo "<td>" . $row['addr_state'] . "</td>";
            echo "<td>" . $row['addr_postcode'] . "</td>";
            echo "<td>" . $row['contact_email'] . "</td>";
            echo "<td>" . $row['contact_phone'] . "</td>";
            echo "<td>" . $row['skills'] . "</td>";
            echo "<td>" . $row['skills_other'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "🚫 No matching job reference number found.";
    }
} else {
    echo "Please enter a job reference number to search.";
}


//This code compares the first & last name then prints out that EOI
if (isset($_GET['search_name_first']) && isset($_GET['search_name_last'])){
    require_once "settings.php"; 

    $name_first = mysqli_real_escape_string($conn, $_GET['search_name_first']); 
    $name_last = mysqli_real_escape_string($conn, $_GET['search_name_last']);

    $sql = "SELECT * FROM EOI WHERE name_first LIKE '%$name_first%' AND name_last LIKE '%$name_last%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
            <th>EOI Number</th>
            <th>Status</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Street</th>
            <th>Suburb</th>
            <th>State</th>
            <th>Postcode</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Skills</th>
            <th>Other Skills</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['eoi_number'] . "</td>";
            echo "<td>" . $row['eoi_status'] . "</td>";
            echo "<td>" . $row['name_first'] . "</td>";
            echo "<td>" . $row['name_last'] . "</td>";
            echo "<td>" . $row['addr_street'] . "</td>";
            echo "<td>" . $row['addr_suburb'] . "</td>";
            echo "<td>" . $row['addr_state'] . "</td>";
            echo "<td>" . $row['addr_postcode'] . "</td>";
            echo "<td>" . $row['contact_email'] . "</td>";
            echo "<td>" . $row['contact_phone'] . "</td>";
            echo "<td>" . $row['skills'] . "</td>";
            echo "<td>" . $row['skills_other'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "🚫 No matching applicant found.";
    }
} else {
    echo "Please enter a applicant first & last name to search.";
}


//This code finds the EOI with the same job reference number and deletes the record from the database
if (isset($_GET['delete_position'])) {
    require_once "settings.php";

    $conn = @mysqli_connect($host, $username, $password, $database);

    if ($conn) {
        $jobref = mysqli_real_escape_string($conn, $_GET['delete_position']);

        $sql = "DELETE FROM EOI WHERE jobref LIKE '%$jobref%'";
        $result = mysqli_query($conn, $sql);

    if ($result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo "EOIs with Job Reference '$jobref' have been deleted.";
            } else {
                echo "🚫 No EOIs found with Job Reference '$jobref'.";
            }
        } else {
            echo "<p>Error executing delete query: " . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
    } else {
        echo "<p>Unable to connect to the database.</p>";
    }

}


//This code updates the status of EOI based on the 
if (isset($_GET['status_update'])) {
    require_once "settings.php";

    $conn = @mysqli_connect($host, $username, $password, $database);

    if ($conn){
        
        $jobref = mysqli_real_escape_string($conn, $_GET['status_update']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $sql = "UPDATE EOI SET eoi_status = 'Archived' WHERE jobref LIKE '%$jobref%'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_affected_rows($conn) > 0) {
            echo "Status for Job Reference '$jobref' updated to '$status'.";
        } else {
            echo "🚫 No EOI found. Nothing changed.";
        }

        mysqli_close($conn);
    } else {
        echo "<p>Unable to connect to the database.</p>";
    }
}


?>


</body>
</html>


































