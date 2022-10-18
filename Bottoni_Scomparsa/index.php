<?php
    $r = 5;
    $c = 5;

    $valori = Array();
    for($i = 0; $i < $r; $i++) 
    {
        for($j = 0; $j < $c; $j++) 
        {
            $valori[$i][$j] = 0;
            if(isset($_POST['T'][$i][$j]) && !isset($_POST['reset'])) 
            {
                $valori[$i][$j] = 1;

            }
        }
    }
?>

<html>
    <head>
        <link rel = "stylesheet" href = "style.css">
    </head>
    <body align = 'center'>
        <form name = 'F1' method = 'post' action = 'index.php'>
            <?php
                echo "<table align = 'center' border = '2';
                >";
                    for($i = 0; $i < $r; $i++) 
                    {
                        echo "<tr>"; 
                            for($j = 0; $j < $c; $j++) 
                            {
                                echo "<td>";
                                    if ($valori[$i][$j] == 0) 
                                    {
                                        echo "<input type = 'submit' name = 'T[".$i."][".$j."]' value = '' />";

                                    } 
                                    else 
                                    {
                                        echo "<input type = 'hidden' name = 'T[".$i."][".$j."]' value = '' />";

                                    }
                                echo "</td>"; 
                            }	
                        echo "</tr>"; 
                    }
                echo "</table>";
            ?>

            <br>

            <input type = 'submit' name = 'reset'  value = 'Reset'/>
        </form>
    </body>
</html>
