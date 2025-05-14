<?php


include "./connectionBase.php";
include "./header.php"; //Se não achar gera Warning e continua normalmente
require "./header.php"; // Se não achar gera Erro fatal

session_start();
session_destroy();
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day                                                                                                                                                                                                    


$firstName = htmlspecialchars($_POST["nome"], FILTER_SANITIZE_SPECIAL_CHARS) ?? "Nome não Informado";
$email = filter_var($POST['email'],FILTER_SANITIZE_EMAIL) ?? "Email não Informado";
try {

  
  $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
  $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
  $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  
  $stmt = $conn->prepare("SELECT *FROM  MyGuests");

  $stmt->execute();
  // set the resulting array to associative
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  while($row  = $stmt->fetchAll()) {
    echo "Resultados :" . ($row) . "\n\n\n";
    printf("%%s = '%s'\n", $n); // representação em string
    
  }

} catch(PDOException $e) {

  echo "Connection failed: " . $e->getMessage();
  echo "Connection failed: " . $e->getTraceAsString();
  throw new Exception("Division by zero");
  die($e->getMessage());

}
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo $row["id"]."--".$row["firstname"]."--".$row["lastname"]. "--" . $row["email"] . "<\br>";
  echo "\n\n\n";
}


?>