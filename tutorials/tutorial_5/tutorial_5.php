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
if(isset($_POST["submit"])) {
  $fileToUpload = $_FILES["fileToUpload"]["name"];
  $fileContent = file_get_contents($_FILES['fileToUpload']['tmp_name']);
 $target_location = basename($fileToUpload);

 if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_location))
{
echo "<h3>The file ". basename( $_FILES['fileToUpload']['name']). " has been uploaded <br></h3>";
}
else
{
echo "Sorry, there was a problem uploading your file.";
}
$fn = fopen($fileToUpload,"r");
echo "<div>";
while(! feof($fn))  {
	$result = fgets($fn);
  
	echo "<p>".$result."</p>";
  echo "<br>";
 
  }
  echo "</div>";
unlink($fileToUpload);
fclose($fn);
}
?>
</body>
</html>