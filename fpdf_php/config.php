<?php

$mysqli = new mysqli("localhost","my_user","my_password","demo_excel");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

?>