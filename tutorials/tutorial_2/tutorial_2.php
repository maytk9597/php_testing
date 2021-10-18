<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div>
    <?php
    $row = 6;
    $space = 2 * $row;

    for ($space_loop = 0; $space_loop <= $row; $space_loop++) {
      for ($star_loop = 0; $star_loop <= $space; $star_loop++) {
        echo "<span>&nbsp</span>";
      }

      if ($space_loop === 0) {
        $star = $space_loop;
      } else {
        $star = 2 * $space_loop - 1;
      }

      for ($star_loop = 0; $star_loop < $star; $star_loop++) {
        echo "<span>*</span>";
      }
      echo "</br>";
      $space = $space - 2;
    }
    $space = 2;
    for ($space_loop = $row - 1; $space_loop >= 0; $space_loop--) {
      for ($star_loop = 0; $star_loop <= $space; $star_loop++) {
        echo "<span>&nbsp</span>";
      }

      $star = 2 * $space_loop - 1;

      for ($star_loop = 0; $star_loop < $star; $star_loop++) {
        echo "<span>*</span>";
      }
      echo "</br>";
      $space = $space + 2;
    }
    ?>
  </div>
</body>