<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div>
    <?php
$row = 6 ;
   $space = 2*$row;

for ($i = 0 ; $i <= $row ; $i ++) {
    for ($j = 0; $j <= $space ; $j ++ ) {
        echo "<span>&nbsp</span>";

    }

    if ($i === 0) {
       $star = $i ;
    }
    else {
      $star = 2*$i -1 ;  
    }

    for ($j = 0 ; $j < $star ; $j++) {
        echo "<span>*</span>";
    }
    echo "</br>";
    $space = $space -2 ;
}
$space = 2;
for ($i = $row-1 ; $i >= 0 ; $i --) {
    for ($j = 0; $j <= $space ; $j ++ ) {
        echo "<span>&nbsp</span>";
    }

      $star = 2*$i -1 ;  
   
    for ($j = 0 ; $j < $star ; $j++) {
        echo "<span>*</span>";
    }
    echo "</br>";
    $space = $space + 2 ;
}
?>
  </div>
</body>
