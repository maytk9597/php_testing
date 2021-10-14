<?php
echo "Testing Data Types\n"; 
echo "Scalar DataTypes \n";
echo "\n+++++++\n";
echo " boolean \n";
echo "+++++++\n";
if (TRUE)
{
echo "Condition is TRUE";
}
else 
{
    echo "Condition is FALSE";
}
echo "\n\n+++++++\n";
echo " integer \n";
echo "+++++++\n";
$dec_int = 12;  
$oct_int = 012;  
$hexa_int = 0x12; 
echo "Decimal number: " .$dec_int. "\n";  
echo "Octal number: " .$oct_int. "\n";  
echo "HexaDecimal number: " .$hexa_int . "\n"; 
echo "\n+++++++\n";
echo " Object";
echo "\n+++++++\n";
class newclass {
   function newFunction() {
    $new_var = "Hello World! \n";
    echo $new_var ;
   }
}
$new_obj = new newclass();
$new_obj -> newFunction();

echo "\n+++++++\n";
echo " Array and Array Sorting";
echo "\n+++++++\n";
$new_arr = array(22,50,30);
var_dump($new_arr);
sort($new_arr);
var_dump($new_arr);
rsort($new_arr);
var_dump($new_arr);