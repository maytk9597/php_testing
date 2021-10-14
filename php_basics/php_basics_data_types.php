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
