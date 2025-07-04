-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 01:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'admin', 'password1234');

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `eoi_number` int(11) NOT NULL,
  `eoi_status` varchar(7) NOT NULL,
  `jobref` varchar(5) NOT NULL,
  `name_first` varchar(30) NOT NULL,
  `name_last` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `addr_street` varchar(100) NOT NULL,
  `addr_suburb` varchar(100) NOT NULL,
  `addr_state` varchar(100) NOT NULL,
  `addr_postcode` int(11) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` int(11) NOT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `skills_other` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`eoi_number`, `eoi_status`, `jobref`, `name_first`, `name_last`, `birthdate`, `gender`, `addr_street`, `addr_suburb`, `addr_state`, `addr_postcode`, `contact_email`, `contact_phone`, `skills`, `skills_other`) VALUES
(1, 'New', 'NAXG2', 'Lachlan', 'Phillips', '2025-05-09', 'Male', 'Street', 'Town', 'SA', 2524, 'someone@something.com', 2147483647, 'Programming, MySQL', 'Undefined'),
(2, 'Current', 'SE7M5', 'Robert', 'Guy', '2025-05-02', 'Male', 'Street', 'Town', 'SA', 2312, 'someone@something.com', 2147483647, 'Programming, Html', 'Undefined'),
(3, 'New', 'SAH05', 'Earl', 'Green', '2025-05-08', 'Other', 'Street', 'Town', 'TAS', 2312, 'someone@something.com', 2147483647, 'Programming, Teamwork', 'Undefined'),
(4, 'New', 'NAXG2', 'Sarah', 'Jones', '2025-05-03', 'Female', 'Street', 'Town', 'ACT', 2524, 'someone@something.com', 2147483647, 'Programming', 'Undefined');

-- --------------------------------------------------------

--
-- Table structure for table `listings_basic`
--

CREATE TABLE `listings_basic` (
  `ref_id` varchar(5) NOT NULL,
  `position` varchar(30) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `yoe` varchar(20) NOT NULL,
  `desc` text NOT NULL,
  `responsibilities` text NOT NULL,
  `essen_qual` text NOT NULL,
  `pref_qual` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listings_basic`
--

INSERT INTO `listings_basic` (`ref_id`, `position`, `salary`, `yoe`, `desc`, `responsibilities`, `essen_qual`, `pref_qual`) VALUES
('NAXG2', 'Network Administrator', '$85,00 - $105,000', 'MINIMUM 2 years', 'Victoria Digital Security Services is seeking a proactive Network Administrator to manage and support our IT network infrastructure. You’ll play a key role in ensuring system performance, security, and reliability across the organisation.', 'Configure, maintain, and troubleshoot network hardware and software\r\n\r\nMonitor network performance and respond to outages\r\n\r\nManage firewalls, VPNs, access controls, and security protocols\r\n\r\nMaintain documentation, perform system backups, and apply updates\r\n\r\nSupport end-users and work with vendors and IT staff', 'Degree in IT, Computer Science, or a related field\n\n1–3 years’ experience in network administration\n\nStrong knowledge of TCP/IP, LAN/WAN, DNS, DHCP, VPN\n\nExperience with Cisco or similar hardware; Windows or Linux servers\n\nStrong communication and problem-solving skills', 'Network+ or CCNA certification\n\nExperience with cloud platforms or virtualization\n\nFamiliarity with monitoring tools and scripting'),
('SAH05', 'Security Analyst', '$95,000–$145,000', 'MINIMUM 2 years', 'Victoria Digital Security Services is hiring a Security Analyst to safeguard our digital assets. You\'ll detect, investigate, and respond to cybersecurity threats, maintain compliance, and collaborate with teams to strengthen system security.', 'Monitor alerts from SIEM, firewalls, and IDS tools\r\n\r\nInvestigate incidents and perform root cause analysis\r\n\r\nConduct vulnerability assessments and support patching\r\n\r\nMaintain security policies and incident response plans\r\n\r\nSupport compliance efforts (ISO 27001, PCI-DSS, etc.)\r\n\r\nEducate staff on cybersecurity best practices\r\n\r\n', 'Bachelor’s degree in Cybersecurity, IT, or related field\r\n\r\n1–3 years in a cybersecurity or IT security role\r\n\r\nExperience with SIEM tools (e.g., Splunk), firewalls, and endpoint protection\r\n\r\nKnowledge of network protocols, system hardening, and threat response\r\n\r\nStrong problem-solving and communication skills', 'Experience with AWS, Azure, or GCP security\r\n\r\nCertifications like CISSP, CISM, GCIH, or CEH\r\n\r\nFamiliarity with compliance standards and scripting (Python, PowerShell)\r\n\r\nBackground in SOC or incident response environments'),
('SE7M5', 'Systems Engineer', '$100,000–$130,000', 'MINIMUM 3 years', 'Victoria Digital Security Services is seeking a skilled Systems Engineer to design, implement, and maintain scalable IT systems that meet business goals. You’ll take a holistic approach to system development, ensuring performance, reliability, and compliance across the enterprise.', 'Design and document system architecture and specifications\r\n\r\nIntegrate hardware, software, and network components\r\n\r\nConfigure, deploy, and maintain systems (Windows/Linux)\r\n\r\nMonitor performance, troubleshoot issues, and optimize uptime\r\n\r\nImplement security protocols and ensure compliance\r\n\r\nAutomate tasks using scripting tools (e.g., PowerShell, Python)\r\n\r\nCollaborate on projects and support infrastructure upgrades', 'Bachelor’s in Systems Engineering, IT, or related field\r\n\r\n3+ years of relevant experience\r\n\r\nCertifications (e.g., Azure Administrator, RHCSA, Linux+)\r\n\r\nStrong understanding of networking, virtualization, and cloud services\r\n\r\nProficiency in scripting and system troubleshooting\r\n\r\nExcellent problem-solving, documentation, and communication skills', 'Master’s degree or advanced certifications (e.g., AWS Architect, CSEP, CCNP)\r\n\r\nExperience with DevOps tools, CI/CD pipelines, and cybersecurity practices\r\n\r\nFamiliarity with enterprise architecture and cloud platforms (AWS, Azure)\r\n\r\nProject management or Agile/Scrum knowledge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`eoi_number`);

--
-- Indexes for table `listings_basic`
--
ALTER TABLE `listings_basic`
  ADD PRIMARY KEY (`ref_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `eoi_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
