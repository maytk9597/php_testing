<?php
$shopping_list = array( 'milk', 'eggs', 'chocolate' ); 

foreach( $shopping_list as $item ) {
	echo 'I need ' . $item . '! ' ."\n";
} 
$i = 0; 
while ( $i < 3 ) :
	echo 'Hello and $i is ' . $i . ' | ' . "\n";
	$i++; 
endwhile;