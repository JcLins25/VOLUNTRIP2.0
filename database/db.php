<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
try {
$con = mysqli_connect("localhost","root","","voluntrip_bd");
// Check connection
if (mysqli_connect_errno()){
  }
}
  catch(Error $e) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>