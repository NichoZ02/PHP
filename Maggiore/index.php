<?php
    $r = 9;
    $c = 9;

    $valori = array();
    for($i = 0; $i < $r; $i++) 
    {
        for($j = 0; $j < $c; $j++) 
        {
            $valori[$i][$j] = null;
            if(isset($_POST['T'][$i][$j]) && !isset($_POST['reset'])) 
            {
                $valori[$i][$j] = 1;

            }
        }
    }
?>

<html>
    <head>
      <meta charset = "UTF-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
      
      <link rel = "stylesheet" href = "style.css">
   </head>
    <body align = 'center'>
        <div id = 'sfondo'>
            <form name = 'F1' method = 'post' action = 'index.php'>
                <?php
                    echo "<table align = 'center' border = '2';>";
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
        <div>
    </body>
</html>