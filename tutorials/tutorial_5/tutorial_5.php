<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial5_MayThinKhaing</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    Select File to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
  </form>
  <?php
  include "library/SimpleXLSX.php";
  if (isset($_POST["submit"])) {
    $fileToUpload = $_FILES["fileToUpload"]["name"];
    $fileContent = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
    $target_location = basename($fileToUpload);
    $extension = pathinfo($_FILES["fileToUpload"]["name"])['extension'];

    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_location)) {
      echo "<h3>The file " . basename($_FILES['fileToUpload']['name']) . " has been uploaded <br></h3>";
    } else {
      echo "Sorry, there was a problem uploading your file.";
    }
    $fn = fopen($fileToUpload, "r");
    echo "<div>";
    if ($extension === "txt") {

      while (!feof($fn)) {
        $result = fgets($fn);

        echo "<p>" . $result . "</p>";
        echo "<br>";
      }
    } elseif ($extension === "csv") {
      $data_array = [];
      while (($data = fgetcsv($fn, 1000, ",")) !== FALSE) {

        $data_array[] = $data;
      }
      display_table($data_array);
    } elseif ($extension === "xlsx") {
      if ($xlsx = SimpleXLSX::parse($fileToUpload)) {
        // var_dump($xlsx->rows());
        echo gettype($xlsx->rows());
        $data_array = $xlsx->rows();
        echo gettype($data_array);
        display_table($data_array);
      } else {
        echo SimpleXLSX::parseError();
      }
    } else {
      echo "Please select txt File";
    }

    echo "</div>";
    unlink($fileToUpload);
    fclose($fn);
  }
  ?>
</body>

</html>

<?php
function display_table($data_array)
{
  echo '<table>';
  $rows = count($data_array);
  for ($i = 0; $i < $rows; $i++) {
    echo "<tr>";
    $cols = count($data_array[$i]);
    for ($j = 0; $j < $cols; $j++)
      echo "<td>" . $data_array[$i][$j] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
}
?>