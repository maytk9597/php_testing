<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial5_loginSuccessful_MayThinKhaing</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class = "container">
  <h2> Login Successful</h2>
  <form method="POST">
  <button type = "submit" name = "submit">LogOut</button>
  </form>
</div>
  <?php
  if(isset($_POST["submit"])){
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
    header('Location: tutorial_4.php'); 
    session_write_close();
  }

  ?>
</body>
</html>