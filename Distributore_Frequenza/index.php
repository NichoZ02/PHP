<?php
	$r = 0;
	$c = 0;

	if(isset($_POST['B']))
	{
		$r = $_POST['R'] * 1;	
		$c = $_POST['C'] * 1;	
	}	

	$colore=array();	  
	$colore[2] = "rgb(0, 0, 0)";
	$colore[3] = "rgb(85, 0, 0)";
	$colore[4] = "rgb(170, 0, 0)";
	$colore[5] = "rgb(255, 0, 0)";
	$colore[6] = "rgb(0, 85, 0)";
	$colore[7] = "rgb(0, 170, 0)";
	$colore[8] = "rgb(0, 255, 0)";
	$colore[9] = "rgb(0, 0, 85)";
	$colore[10] = "rgb(0, 0, 170)";
	$colore[11] = "rgb(0, 0, 255)";
	$colore[12] = "rgb(255, 0, 255)";
?>

<html>
	<body>
		<?php
			echo "<form name = 'F1' method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
			echo "Righe: <input type = 'text' name = 'R' value = '".$r."' size = '3'>";
			echo "&nbsp; Colonne: <input type = 'text' name = 'C' value = '".$c."' size = '3'>";
			echo "&nbsp; <input type = 'submit' name = 'B' value = 'Genera'>";
			echo "</form>";    

			if(isset($_POST['B']))
			{
				$dist = array();	  
				for($j = 2; $j < 13; $j++)
				{
					$dist[$j] = 0;
				}

				echo "<table border = '1'>";
					for($i = 0; $i < $r; $i++)
					{
						echo "<tr>";	  
							for($j = 0; $j < $c; $j++)
							{
								$d1 = rand(1, 6);
								$d2 = rand(1, 6);
								$dadi = $d1 + $d2;

								$dist[$dadi]++;			

								echo "<td style = 'width: 30px; height: 20px; color: white; background-color: ".$colore[$dadi].";'>";
									echo ($dadi);		
								echo "</td>";	 
							}	 
						echo "</tr>";	  
					}	  
				echo "</table>";

				echo "<br>";

				echo "<table border = '1'>";
					for($i = 0; $i < 2; $i++)
					{
						echo "<tr>";	  
							for($j = 2; $j < 13; $j++)
							{
								if($i == 0)
								{
									echo "<td style = 'width: 30px; height: 20px; color: white; background-color: ".$colore[$j].";'>";
										echo $j;		
									echo "</td>";	 
								}
								else
								{		   
									echo "<td style = 'width: 30px; height: 20px; color: black; background-color: yellow;'>";
										echo $dist[$j];
									echo "</td>";	 
								}				
							}	 
						echo "</tr>";	  
					}	  
				echo "</table>";
			}
		?>
	</body>
</html>