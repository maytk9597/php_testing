<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <label for=”fileToUpload”> Select Image to Upload
      <input type="file" name="fileToUpload" id="fileToUpload">
      <label for=”folderName”> Select Image to Upload
        <input type="text" name="folderName" id="folderName">
        <input type="submit" value="Upload File" name="submit" class="submit">
  </form>
  <?php

  if (isset($_POST["submit"])) {
    if (empty($_POST["folderName"])) {
      echo "<p class = error>Please Enter Folder Name to Store</p>";
    } else {
      $folderName = $_POST["folderName"];
      if (is_dir($folderName) === false) {
        mkdir($folderName);
      }
      $fileToUpload = $_FILES["fileToUpload"]["name"];
      $target_location = $folderName . "/" . basename($fileToUpload);
      $extension = pathinfo($_FILES["fileToUpload"]["name"])['extension'];
      $isImage = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      $upload = true;
      if ($isImage !== false) {
        $upload = true;
      } else {
        echo "<p class = error>Uploaded File is Not an Image</p>";
        $upload = false;
      }
      if (file_exists($target_location)) {
        echo "<p class = error>Sorry, file already exists in $folderName</p>";
        $upload = false;
      }
      if (
        $extension != "jpg" && $extension != "png" && $extension != "jpeg"
        && $extension != "gif"
      ) {
        echo "<p class = error>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
        $upload = false;
      }
      if ($upload == false) {
        echo "<p class = error>Sorry, your file can't upload.</p>";
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_location)) {
          echo "<p>The file $fileToUpload has been uploaded in $folderName</p>";
        } else {
          echo "<p class = error>Sorry, there was an error uploading your file.</p>";
        }
      }
    }
  }

  ?>
</body>

</html>