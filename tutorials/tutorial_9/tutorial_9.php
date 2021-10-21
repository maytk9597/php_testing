<?php
header('Content-Type: application/json');
$con = new mysqli("localhost", "may", "Maytk!9597", "tutorial_7");

if (!$con) {

  echo mysqli_connect_error();
  die();
}

$query = sprintf("SELECT name, mark FROM users ORDER BY id");

$result = $con->query($query);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

$result->close();

$con->close();

print json_encode($data);
