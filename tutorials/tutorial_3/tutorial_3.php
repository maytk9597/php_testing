<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h2>Calculate Your Age</h2>
  <label>Select your Date Of Birth</label>
  <form action="" method="get">
    <input type="date" name="Birthday">
    <input type="submit" name="submit">
  </form>
</body>

<?php
if (isset($_GET['submit'])) {
  $birth_date = date("Y-m-d", strtotime($_GET['Birthday']));
  echo "<p>Your Birthday is $birth_date</p>";
  $today = date("Y-m-d");
  $diff = date_diff(date_create($birth_date), date_create($today));
  echo "<p>Your age : $diff->y years, $diff->m month, $diff->d days</p>";
}

?>