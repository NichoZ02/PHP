<?php

$r = 0;
$c = 0;
// controllo il passaggio dal bottone B
if(isset($_POST['B']))
{
   $r = $_POST['R'] * 1;	
   $c = $_POST['C'] * 1;	
}	

?>

<html>
    <body>
        <?php
        // disegno il form con gli oggetti necessari
        echo "<form name = 'F1' method = 'post' action = '".$_SERVER['PHP_SELF']."'>";
        echo "&nbsp; r: <input type = 'text' name = 'R' value = '".$r."' size = '3'>";
        echo "&nbsp; c: <input type = 'text' name = 'C' value = '".$c."' size = '3'>";
        echo "&nbsp; <input type = 'submit' name = 'B' value = 'matrice'>";
        echo "</form>";    

        // qui disegno la tabella
        if($r > 0 && $r < 100 && $c > 0 && $c < 100)
        {
            if(isset($_POST['B']))
            {
                echo "<table border = '1'>";
                // iterazione per le righe 
                for($i = 0; $i < $r; $i++)
                {
                    echo "<tr>";	  
                    // iterazione per le colonne
                    for($j = 0; $j < $c; $j++)
                    {
                        echo "<td style = 'width: 30px; height: 20px; text-align: center'>";

                        // contenuto della singola cella
                        $num = rand(1, 99);
                        
                        echo $num;			

                        echo "</td>";	 
                    }	 
                    echo "</tr>";	  
                }	  
                echo "</table>";
            }
        }
        else
        {
            echo "Tabella non disponibile";
        }
        ?>
    </body>
</html>
