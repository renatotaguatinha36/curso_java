<?php



$servername = "localhost";
$username = "username";
$password = "password";


$email - filter_var($POST['email'],FILTER_SANITIZE_EMAIL);
try {

  $conn = new PDO ("mysql:host=$servername;dbname=myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  echo "Connected successfully";
  $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
  $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
  $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);

  $stmt = $conn->prepare("SELECT *FROM  pessoas");
  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  while($row  = $stmt->fetchAll()) {
    echo "Resultados :" . ($row) . "\n\n\n";
    printf("%%s = '%s'\n", $n); // representação em string
    
  }

} catch(PDOException $e) {

  echo "Connection failed: " . $e->getMessage();
  echo "Connection failed: " . $e->getTraceAsString();
  die($e->getMessage());

}



?>