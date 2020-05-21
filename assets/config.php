<?php
// DB credentials.
define('DB_HOST', 'localhost'); // Host name
define('DB_USER', 'root'); // db user name
define('DB_PASS', ''); // db user password name
define('DB_NAME', 'TMS'); // db name
// Establish database connection.
try {
  $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch (PDOException $e) {
  exit("Connection failed: " . $e->getMessage());
}
