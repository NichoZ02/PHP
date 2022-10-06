<?php
    $r = 0;
    $c = 0;
    $conts = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];
    $m = [];
    $m[]= [];

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

            if(isset($_POST['B']))
            { 
                for($i = 0; $i < $r; $i++)
                {
                    for($j = 0; $j < $c; $j++)
                    {
                        $d1 = rand(1, 6);
                        $d2 = rand(1, 6);
                        $m[$i][$j] = $d1 + $d2;	
                    } 		 
                }

                echo "<table border = '2' style = 'margin: 20px;'>";
                    for($i = 0; $i < $r; $i++)
                    {
                        echo "<tr>";	  
                            for($j = 0; $j < $c; $j++)
                            {
                                echo "<td style = 'width: 30px; height: 20px;'>";

                                echo $m[$i][$j];

                                echo "</td>";	 
                            }	 
                        echo "</tr>";	  
                    }	  
                echo "</table>";


                echo "<table border = '2'>";
                    for($i = 0; $i < 2; $i++)
                    {
                        echo "<tr>";
                            for($j = 0; $j < 12; $j++)
                            {
                                echo "<td style = 'width: 30px; height: 20px;'>";



                                echo "</td>";	 
                            }	 
                        echo "</tr>";	  
                    }	  
                echo "</table>";
            }
        ?>
    </body>
</html>