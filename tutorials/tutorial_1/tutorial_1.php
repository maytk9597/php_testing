<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<table>
		<?php 
		for ($row = 0 ; $row<8 ; $row ++) {
			echo "<tr>";
			for ($column = 0; $column<8;$column++){
				$total = $row + $column ;
				if ($total % 2 ==0) {
					echo "<td  bgcolor = #ffffff></td>";
				}
				else {
					echo "<td bgcolor = #000000></td>";
				}
			}
			echo "</tr>";
		}
		?>
	</table>
</body>