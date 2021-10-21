<?php
$con = mysqli_connect("localhost", "may", "Maytk!9597", "tutorial_7");

if (!$con) {

  echo mysqli_connect_error();
  die();
}
function fetch_data($connection)
{
  $query = "SELECT * from users ORDER BY id ASC";
  $exec = mysqli_query($connection, $query);
  if (mysqli_num_rows($exec) > 0) {
    $row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;
  } else {
    return $row = [];
  }
}
function delete_data($connection, $id)
{
  $query = "DELETE FROM users WHERE id==$id ORDER BY id";
  $exec = mysqli_query($connection, $query);
  if ($exec) {
    echo "<p>ID$id Deleted Successfully</p>";
  } else {
    $msg = "Error: " . $query . "<br>" . mysqli_error($connection);
    echo $msg;
  }
}
function update_data($connection, $id, $email, $name, $mark)
{


  $query = "UPDATE users
          SET name='$name',
              email='$email', WHERE id==$id";
  $exec = mysqli_query($connection, $query);

  if ($exec) {
    echo "<p>Update Complete</p>";
  } else {
    $msg = "Error: " . $query . "<br>" . mysqli_error($connection);
    echo $msg;
  }
}
