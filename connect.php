<?php
  $hostname = "localhost";
  $username = "root";
  $password = "root";
  $database = "expense_track";

  $conn = mysqli_connect($hostname, $username, $password, $database);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  else {
    echo "Connected successfully";
  }
