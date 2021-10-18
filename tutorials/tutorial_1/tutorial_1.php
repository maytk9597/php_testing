<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 01</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="test">
  <table class="black">
    <?php
    for ($row = 0; $row < 8; $row++) {
      echo "<tr>";
      for ($column = 0; $column < 8; $column++) {
        $total = $row + $column;
        if ($total % 2 == 0) {
         /* ?>
          <td class="white"></td>
          <?php
          */
          echo " <td class=white></td>";
          // echo "<td bgcolor = #ffffff></td>";
        } else {
          echo "<td bgcolor = #000000></td>";
        }
      }
      echo "</tr>";
    }
    ?>
  </table>
</body>

</html>