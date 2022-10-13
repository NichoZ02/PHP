<?php
    $r = 5;
    $c = 5;
?>

<html>
    <head>
        <link rel = "stylesheet" href = "style.css">
    </head>
    <body>
        <form name = 'F1' method = 'POST' action = 'index.php'>
            <?php
                echo "<table border = '1'>";
                    for($j = 0; $j < $r; $j++)
                    {
                        echo "<tr>"; 
                        for($i = 0; $i < $c; $i++)
                        {
                            echo "<td>"."<input name = 'B' type = 'submit' value = ''"."</td>"; 

                        }		  
                        echo "</tr>"; 
                    }		  
                echo "</table>";
            ?>

            <br>

            <input type = 'submit' name = 'R' value = 'Reset'/>
        </form>
    </body>
</html>
