<?php include("header.inc");?> <!-- Include the header file -->
<head>
    <title>VDLS - Careers at VDLS</title>
    <meta name="description" content="Work under your corporate overlords in our currently open positions.">
</head>

<body>

<?php 
    require_once("settings.php");
?>  <!-- Responsibilities and Qualifications are shortened versions of job listings found in Assignmet Part 1 using ChatGPT
        Date: 24/05/2025 -->

<?php include("nav.inc");?> <!-- Include the menu navigation file -->

    <!--Put all of the webpage content inside this div-->
<div class="site_content jobs_background">
        
        
        <h1>Careers at Victoria Digital Security</h1> <!-- Main title of the page -->
        <p>We are currently looking to expand Victoria Digital Security. Positions that are currently open are listed below.</p> <!-- Short descriptor of the page -->
   
    <aside id="jobs_disclaim_section"> <!-- Aside section with benefits and disclaimers stay on right side of screen -->
        <div id="benefits">
            <h2><strong>Benefits at Victoria Digital Security</strong></h2>
            <p>At Victoria Digital Security, you will employee benefits, such as:</p>
            <br>
            All mandatory benefits in Victoria, including:
                <ul>
                    <li>4 weeks annual paid leave</li>
                    <li>Parental leave</li>
                    <li>Sick leave</li>
                    <li>Days off and/or increased pay on public holidays</li>
                    <li>Superannuation that is managed by us</li>
                    <li>Workers' Compensation Insurance</li>                    
                </ul>
                Standard workplace benefits, including:
                <ul>
                    <li>Flexible work arrangements, such as flexible hours and working from home</li>
                    <li>Employee training and development</li>
                    <li>Career progression opportunities, such as promotions</li>
                    <li>Medical and mental wellbeing programs, such as mental health support and wellbeing programs</li>
                    <li>Team-building and social exercises</li>
                </ul>
                Additional workplace benefits
                <ul>
                    <li>Ergenomic workstations to support our employees</li>
                    <li>Communal facilities</li>
                </ul>
                <br>
            <!-- All beneifts generated by ChatGPT
             Prompt: "what kind of benefits do typical office workplaces offer?"
             Date: 13/04/2025 -->
        </div>
        <div id="notesdisclaimers">
            <h2><strong>Notes and Disclaimers</strong></h2>
            <p>Equal Opportunity Employer Statement</p>
            <ul>
                <li><em>We are an Equal Opportunity Employer and are committed to fostering a diverse and inclusive workplace. All qualified applicants will receive consideration for employment without regard to race, color, religion, sex, sexual orientation, gender identity or expression, age, disability, marital status, family responsibilities, political belief, national origin, or any other characteristic protected under applicable equal opportunity laws.</em></li>
                <!-- Equal Opportunity Statement generated by ChatGPT
                Prompt: "write a disclaimer according to the equal opportunity act"
                Date: 11/04/2025 -->
            </ul>            
            <ul>
                <li>Preferable requirements are not exhaustive and we may or may not look for more skills/qualities that are not listed under the job listings. Think of them as "nice to haves".</li>
                <li>Responsibilities and tasks listed under job listings are not exhaustive, and you may be requierd to perform job functions beyond those described.</li>
                <!-- Job functions disclaimer made in reference to https://www.zippia.com/employer/how-to-write-a-job-description/ -->
            </ul>            
        </div>        
    </aside>

    <br><br>

    <div id="jobs_positions">  <!-- Seperate div for listed positions -->
        <h2>Currently Open Positions at Careers at Victoria Digital Security</h2>

        <?php //php start
            $query = "SELECT * FROM listings_basic"; //Query to get the first job listing data
            $result = mysqli_query($conn, $query);
            if (!$result ||  mysqli_num_rows($result) == 0)
            {
                    echo "<p>No data found in job listings!</p>";
                    return;
            }
            while ($row = mysqli_fetch_assoc($result)) {
                        //Making data safe to output 
                        $ref_id = htmlspecialchars($row['ref_id']);
                        $position = htmlspecialchars($row['position']);
                        $salary = htmlspecialchars($row['salary']);
                        $yoe = htmlspecialchars($row['yoe']);
                        $desc = htmlspecialchars($row['desc']);
                        $responsibilities = str_replace("\r\n\r\n","<br><br>", htmlspecialchars($row['responsibilities'])); // str_replace found at https://www.php.net/manual/en/function.str-replace.php
                        $essen_qual = str_replace("\r\n\r\n","<br><br>", htmlspecialchars($row['essen_qual']));
                        $pref_qual = str_replace("\r\n\r\n","<br><br>", htmlspecialchars($row['pref_qual']));

                        //Display database content
                        echo("<section id=\"network_admin\">");
                        echo "<h3>$position</h3>";
                        echo "<p>Reference ID: $ref_id</p>";
                        echo "<p>Salary: $salary</p>";
                        echo "<p>Years of Experience: $yoe</p>";
                        echo "<h4>Brief Description</h4>";
                        echo "<p>$desc</p><br>";
                        echo "<h4>❗ Key Responsibilities</h4>";
                        echo "<p>$responsibilities</p><br>";
                        echo "<h4>✅ Essential Qualifications</h4>";
                        echo "<p>$essen_qual</p><br>";
                        echo "<h4>👍 Preferred Qualifications</h4>";
                        echo "<p>$pref_qual</p>";
                        echo("<h3>Finished Reading? Apply <a href=\"apply.php\">Here.</a></h3>");
                        echo("</section>");
                        echo("<br><br>");
            }
        ?>
        
    </div>
</div>

<?php include("footer.inc");?> <!-- Include the footer file -->

</body>
</html>