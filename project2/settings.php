<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "EOI";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Lachlan - EOI table
$conn->query("CREATE TABLE IF NOT EXISTS EOI (
    eoi_number INT AUTO_INCREMENT PRIMARY KEY,
    eoi_status VARCHAR(7) NOT NULL,
    jobref VARCHAR(5) NOT NULL,
    name_first VARCHAR(30) NOT NULL,
    name_last VARCHAR(30) NOT NULL,
    birthdate DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    addr_street VARCHAR(100) NOT NULL,
    addr_suburb VARCHAR(100) NOT NULL,
    addr_state VARCHAR(100) NOT NULL,
    addr_postcode INT NOT NULL,
    contact_email VARCHAR(100) NOT NULL,
    contact_phone INT NOT NULL,
    skills VARCHAR(100),
    skills_other VARCHAR(2048) NOT NULL
    )");

// Lachlan - ACCOUNTS table
$conn->query("CREATE TABLE IF NOT EXISTS ACCOUNTS (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    user_password VARCHAR(50) NOT NULL
    )");

// Marcus - listings_basic table
$conn->query("CREATE TABLE IF NOT EXISTS `listings_basic` (
  `ref_id` varchar(5) NOT NULL PRIMARY KEY,
  `position` varchar(30) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `yoe` varchar(20) NOT NULL,
  `desc` text NOT NULL,
  `responsibilities` text NOT NULL,
  `essen_qual` text NOT NULL,
  `pref_qual` text NOT NULL
   )");

// Marcus - Insert listings into database
$conn->query("REPLACE INTO `listings_basic` (`ref_id`, `position`, `salary`, `yoe`, `desc`, `responsibilities`, `essen_qual`, `pref_qual`) VALUES
('NAXG2', 'Network Administrator', '$85,00 - $105,000', 'MINIMUM 2 years', 'Victoria Digital Security Services is seeking a proactive Network Administrator to manage and support our IT network infrastructure. You’ll play a key role in ensuring system performance, security, and reliability across the organisation.', 'Configure, maintain, and troubleshoot network hardware and software\r\n\r\nMonitor network performance and respond to outages\r\n\r\nManage firewalls, VPNs, access controls, and security protocols\r\n\r\nMaintain documentation, perform system backups, and apply updates\r\n\r\nSupport end-users and work with vendors and IT staff', 'Degree in IT, Computer Science, or a related field\n\n1–3 years’ experience in network administration\n\nStrong knowledge of TCP/IP, LAN/WAN, DNS, DHCP, VPN\n\nExperience with Cisco or similar hardware; Windows or Linux servers\n\nStrong communication and problem-solving skills', 'Network+ or CCNA certification\n\nExperience with cloud platforms or virtualization\n\nFamiliarity with monitoring tools and scripting'),
('SAH05', 'Security Analyst', '$95,000–$145,000', 'MINIMUM 2 years', 'Victoria Digital Security Services is hiring a Security Analyst to safeguard our digital assets. You\'ll detect, investigate, and respond to cybersecurity threats, maintain compliance, and collaborate with teams to strengthen system security.', 'Monitor alerts from SIEM, firewalls, and IDS tools\r\n\r\nInvestigate incidents and perform root cause analysis\r\n\r\nConduct vulnerability assessments and support patching\r\n\r\nMaintain security policies and incident response plans\r\n\r\nSupport compliance efforts (ISO 27001, PCI-DSS, etc.)\r\n\r\nEducate staff on cybersecurity best practices\r\n\r\n', 'Bachelor’s degree in Cybersecurity, IT, or related field\r\n\r\n1–3 years in a cybersecurity or IT security role\r\n\r\nExperience with SIEM tools (e.g., Splunk), firewalls, and endpoint protection\r\n\r\nKnowledge of network protocols, system hardening, and threat response\r\n\r\nStrong problem-solving and communication skills', 'Experience with AWS, Azure, or GCP security\r\n\r\nCertifications like CISSP, CISM, GCIH, or CEH\r\n\r\nFamiliarity with compliance standards and scripting (Python, PowerShell)\r\n\r\nBackground in SOC or incident response environments'),
('SE7M5', 'Systems Engineer', '$100,000–$130,000', 'MINIMUM 3 years', 'Victoria Digital Security Services is seeking a skilled Systems Engineer to design, implement, and maintain scalable IT systems that meet business goals. You’ll take a holistic approach to system development, ensuring performance, reliability, and compliance across the enterprise.', 'Design and document system architecture and specifications\r\n\r\nIntegrate hardware, software, and network components\r\n\r\nConfigure, deploy, and maintain systems (Windows/Linux)\r\n\r\nMonitor performance, troubleshoot issues, and optimize uptime\r\n\r\nImplement security protocols and ensure compliance\r\n\r\nAutomate tasks using scripting tools (e.g., PowerShell, Python)\r\n\r\nCollaborate on projects and support infrastructure upgrades', 'Bachelor’s in Systems Engineering, IT, or related field\r\n\r\n3+ years of relevant experience\r\n\r\nCertifications (e.g., Azure Administrator, RHCSA, Linux+)\r\n\r\nStrong understanding of networking, virtualization, and cloud services\r\n\r\nProficiency in scripting and system troubleshooting\r\n\r\nExcellent problem-solving, documentation, and communication skills', 'Master’s degree or advanced certifications (e.g., AWS Architect, CSEP, CCNP)\r\n\r\nExperience with DevOps tools, CI/CD pipelines, and cybersecurity practices\r\n\r\nFamiliarity with enterprise architecture and cloud platforms (AWS, Azure)\r\n\r\nProject management or Agile/Scrum knowledge')"); // https://stackoverflow.com/questions/1361340/how-can-i-do-insert-if-not-exists-in-mysql
?>