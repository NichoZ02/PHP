<?php

$r = 0;
$c = 0;
$num = [];
$num[] = [];

if(isset($_POST['B']))
{
   $r = $_POST['R'] * 1;	
   $c = $_POST['C'] * 1;	
}	

?>

<html>
    <body>
        <?php   
         echo "<form name = 'F1' method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
         echo "&nbsp; Righe: <input type = 'text' name = 'R' value = '".$r."' size = '3'>";
         echo "&nbsp; Colonne: <input type = 'text' name = 'C' value = '".$c."' size = '3'>";
         echo "&nbsp; <input type = 'submit' name = 'B' value = 'Genera'>";
         echo "</form>"; 
        $max = 0;

        if(isset($_POST['B']))
        {
            echo "<table border = '2'>";

            for($i = 0; $i < $r; $i++)
            {	  
                for($j = 0; $j < $c; $j++)
                {
                    $num[$i][$j] = rand(1, 99);
                    
                    if($num[$i][$j] > $max)
                    {
                        $max = $num[$i][$j];
                        
                    }
                }	 
            }

            for($i = 0; $i < $r; $i++)
            {
                echo "<tr>";	  

                for($j = 0; $j < $c; $j++)
                {
                    if($num[$i][$j] == $max)
                    {
                        echo "<td style = 'width: 30px; height: 20px; text-align: center; background-color: #FF6666;'>".$max;
                        
                    }
                    else
                    {
                        echo "<td style = 'width: 30px; height: 20px; text-align: center; background-color: white;'>".$num[$i][$j];

                    }

                    echo "</td>";
                }	

                echo "</tr>";	  
            }
            
            echo "</table>";
        }
        ?>
    </body>
</html>
