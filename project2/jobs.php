<?php include("header.inc");?> <!-- Include the header file -->
<head>
    <title>VDLS - Careers at VDLS</title>
    <meta name="description" content="Work under your corporate overlords in our currently open positions.">
</head>

<body>

<?php 
    require_once("settings.php");
    // Marcus - Insert listings into database

    // This is just in case someone forgets to populate the
    // listings_basic table on the day of the presentation and the such
    $conn->query("REPLACE INTO `listings_basic` (`ref_id`, `position`, `salary`, `yoe`, `desc`, `responsibilities`, `essen_qual`, `pref_qual`) VALUES
    ('NAXG2', 'Network Administrator', '$85,00 - $105,000', 'MINIMUM 2 years', 'Victoria Digital Security Services is seeking a proactive Network Administrator to manage and support our IT network infrastructure. You’ll play a key role in ensuring system performance, security, and reliability across the organisation.', 'Configure, maintain, and troubleshoot network hardware and software\r\n\r\nMonitor network performance and respond to outages\r\n\r\nManage firewalls, VPNs, access controls, and security protocols\r\n\r\nMaintain documentation, perform system backups, and apply updates\r\n\r\nSupport end-users and work with vendors and IT staff', 'Degree in IT, Computer Science, or a related field\n\n1–3 years’ experience in network administration\n\nStrong knowledge of TCP/IP, LAN/WAN, DNS, DHCP, VPN\n\nExperience with Cisco or similar hardware; Windows or Linux servers\n\nStrong communication and problem-solving skills', 'Network+ or CCNA certification\n\nExperience with cloud platforms or virtualization\n\nFamiliarity with monitoring tools and scripting'),
    ('SAH05', 'Security Analyst', '$95,000–$145,000', 'MINIMUM 2 years', 'Victoria Digital Security Services is hiring a Security Analyst to safeguard our digital assets. You\'ll detect, investigate, and respond to cybersecurity threats, maintain compliance, and collaborate with teams to strengthen system security.', 'Monitor alerts from SIEM, firewalls, and IDS tools\r\n\r\nInvestigate incidents and perform root cause analysis\r\n\r\nConduct vulnerability assessments and support patching\r\n\r\nMaintain security policies and incident response plans\r\n\r\nSupport compliance efforts (ISO 27001, PCI-DSS, etc.)\r\n\r\nEducate staff on cybersecurity best practices\r\n\r\n', 'Bachelor’s degree in Cybersecurity, IT, or related field\r\n\r\n1–3 years in a cybersecurity or IT security role\r\n\r\nExperience with SIEM tools (e.g., Splunk), firewalls, and endpoint protection\r\n\r\nKnowledge of network protocols, system hardening, and threat response\r\n\r\nStrong problem-solving and communication skills', 'Experience with AWS, Azure, or GCP security\r\n\r\nCertifications like CISSP, CISM, GCIH, or CEH\r\n\r\nFamiliarity with compliance standards and scripting (Python, PowerShell)\r\n\r\nBackground in SOC or incident response environments'),
    ('SE7M5', 'Systems Engineer', '$100,000–$130,000', 'MINIMUM 3 years', 'Victoria Digital Security Services is seeking a skilled Systems Engineer to design, implement, and maintain scalable IT systems that meet business goals. You’ll take a holistic approach to system development, ensuring performance, reliability, and compliance across the enterprise.', 'Design and document system architecture and specifications\r\n\r\nIntegrate hardware, software, and network components\r\n\r\nConfigure, deploy, and maintain systems (Windows/Linux)\r\n\r\nMonitor performance, troubleshoot issues, and optimize uptime\r\n\r\nImplement security protocols and ensure compliance\r\n\r\nAutomate tasks using scripting tools (e.g., PowerShell, Python)\r\n\r\nCollaborate on projects and support infrastructure upgrades', 'Bachelor’s in Systems Engineering, IT, or related field\r\n\r\n3+ years of relevant experience\r\n\r\nCertifications (e.g., Azure Administrator, RHCSA, Linux+)\r\n\r\nStrong understanding of networking, virtualization, and cloud services\r\n\r\nProficiency in scripting and system troubleshooting\r\n\r\nExcellent problem-solving, documentation, and communication skills', 'Master’s degree or advanced certifications (e.g., AWS Architect, CSEP, CCNP)\r\n\r\nExperience with DevOps tools, CI/CD pipelines, and cybersecurity practices\r\n\r\nFamiliarity with enterprise architecture and cloud platforms (AWS, Azure)\r\n\r\nProject management or Agile/Scrum knowledge')"); // https://stackoverflow.com/questions/1361340/how-can-i-do-insert-if-not-exists-in-mysql
?>

<?php include("nav.inc");?> <!-- Include the menu navigation file -->

    <!--Put all of the webpage content inside this div-->
    <div class="site_content jobs_background">
        
        
        <h1>Careers at Victoria Digital Security</h1>
        <p>We are currently looking to expand Victoria Digital Security. Positions that are currently open are listed below.</p>
   
    <aside id="jobs_disclaim_section">
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
                        $responsibilities = htmlspecialchars($row['responsibilities']);
                        $essen_qual = htmlspecialchars($row['essen_qual']);
                        $pref_qual = htmlspecialchars($row['pref_qual']);

                        //Display database content
                        echo("<section id=\"network_admin\">");
                        echo "<h3>$position</h3>";
                        echo "<p>Reference ID: $ref_id</p>";
                        echo "<p>Salary: $salary</p>";
                        echo "<p>Years of Experience: $yoe</p>";
                        echo "<h4>Brief Description</h4>";
                        echo "<p>$desc</p><br>";
                        echo "<h4>Key Responsibilities</h4>";
                        echo "<p>$responsibilities</p><br>";
                        echo "<h4>Essential Qualifications</h4>";
                        echo "<p>$essen_qual</p><br>";
                        echo "<h4>Preferred Qualifications</h4>";
                        echo "<p>$pref_qual</p>";
                        echo("</section>");
                        echo("<br><br>");
            }
        ?>
        <br>
    </div>
</div>

<?php include("footer.inc");?> <!-- Include the footer file -->

</body>
</html>