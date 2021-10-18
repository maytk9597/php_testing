<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Tutorial4_MayThinKhaing</title>
</head>

<body>
  <?php

  session_start();
  if (session_id() == '' || !isset($_SESSION['username'])) {
  ?>
    <div class="container">

      <h2>Enter User Name and Password</h2>
      <form method="POST">
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" name="submit">LogIn</button>

        <?php
        $user_name = "May";
        $password = "may1234";
        if (isset($_POST["submit"])) {
          if (isset($_POST["username"]) && isset($_POST['password'])) {
            if ($_POST["username"] === $user_name && $_POST['password'] === $password) {
              $_SESSION["username"] = $_POST["username"];
              echo "Successful Login";
              header('Location: login_successful.php');
            } else {
              echo "<p>User Name or Password is incorrect</p>";
            }
          }
        }
        ?>
      </form>
    </div>
  <?php
  } else {
    header('Location: login_successful.php');
  }
  ?>
</body>

</html>