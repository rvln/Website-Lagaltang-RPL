<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chatapp";

  $conn_user = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn_user){
    echo "Database connection error".mysqli_connect_error();
  }
?>
