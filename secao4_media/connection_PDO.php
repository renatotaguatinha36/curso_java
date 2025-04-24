<?php

$servername = "localhost";
$username = "username";
$password = "password";

try {

  $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  echo "Connected successfully";
  $stmt = $conn->prepare("SELECT *FROM  pessoas");
  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  while($row  = $stmt->fetchAll()) {
    echo "Resultados :" . ($row);
  }

} catch(PDOException $e) {

  echo "Connection failed: " . $e->getMessage();
  echo "Connection failed: " . $e->getTraceAsString();
  die($e->getMessage());

}



?>