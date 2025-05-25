<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "EOI";
$database_listings = "listings_basic"

$conn = mysqli_connect($host, $username, $password, $database);
$conn_listings = $conn = mysqli_connect($host, $username, $password, $database_listings);

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
$conn_listings->query("CREATE TABLE IF NOT EXISTS `listings_basic` (
  `ref_id` varchar(5) NOT NULL,
  `position` varchar(30) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `yoe` varchar(20) NOT NULL,
  `desc` text NOT NULL,
  `responsibilities` text NOT NULL,
  `essen_qual` text NOT NULL,
  `pref_qual` text NOT NULL
   )");

?>