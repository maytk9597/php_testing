<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=
  , initial-scale=1.0">
  <title>Tutorial7_MayThinKhaing</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post">
  <label for=”qr_value”>Enter Some Value to Generate QR Code: </label>
  <input type="text" name="qr_value">
  <input type="submit" name="generate" value="Generate" class = "submit">
 </form>
 <?php 
  include('lib/phpqrcode/qrlib.php'); 
 if(isset($_POST["generate"])) {
   if(empty($_POST["qr_value"]))
   {
     echo "<p>Enter Value for QR code</p>";
   }
   else {
    $text=$_POST['qr_value'];
    $folder="images/";
    $file_name="qr.png";
    $file_name=$folder.$file_name;
    QRcode::png($text,$file_name);
    echo"<img src='images/qr.png'>";
   }

 }

 ?>
</body>
</html>