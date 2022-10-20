<?php
    session_start();

    $r = 9;
    $c = 9;
    $lastPos = null;
    $matrice = Array();
    $x = $_SESSION['x'];
    $y = $_SESSION['y'];
    
    if(!isset($_SESSION['x']) || !isset($_SESSION['y']))
    {
        $_SESSION['x'] = 4;
        $_SESSION['y'] = 4;
        $_SESSION['lastPos'] = 'Nessuna';
        $_SESSION['contMosse'] = 0;
    }

    if(isset($_POST['pos_n']) && $_SESSION['x'] > 0)
    {
        $_SESSION['x'] = $_SESSION['x'] - 1;
        $_SESSION['lastPos'] = 'N';
        $_SESSION['contMosse']++;
    }
    if(isset($_POST['pos_s']) && $_SESSION['x'] < 8)
    {
        $_SESSION['x'] = $_SESSION['x'] + 1;
        $_SESSION['lastPos'] = 'S';
        $_SESSION['contMosse']++;
    }
    if(isset($_POST['pos_e']) && $_SESSION['y'] < 8)
    {
        $_SESSION['y'] = $_SESSION['y'] + 1;
        $_SESSION['lastPos'] = 'E';
        $_SESSION['contMosse']++;
    }
    if(isset($_POST['pos_o']) && $_SESSION['y'] > 0)
    {
        $_SESSION['y'] = $_SESSION['y'] - 1;
        $_SESSION['lastPos'] = 'O';
        $_SESSION['contMosse']++;
    }
?>

<html>
    <head>
      <meta charset = "UTF-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

      <title> Percorso </title>
      
      <link rel = "stylesheet" href = "style.css">
   </head>
    <body>
        <div id = "sfondo">
            <form name = 'F1' method = 'POST' action = 'index.php'>
                <?php
                    echo "<table align = 'center' border = '2';>";
                        for($i = 0; $i < $r; $i++)
                        {
                            for($j = 0; $j < $c; $j++)
                            {
                                $matrice[$i][$j] = "<td style = 'width: 30px; height: 30px;'> &nbsp;&nbsp; </td>";
                            }
                        }
                        $matrice[$x][$y] = "<td 'style = 'width: 30px; height: 30px; background-color: red;'> &nbsp;&nbsp; </td>";
                        for($i = 0; $i < $r; $i++)
                        {
                            echo "<tr>";
                                for($j = 0; $j < $c; $j++)
                                {
                                    echo $matrice[$i][$j];
                                }
                            echo "</tr>";
                        }
                    echo "</table>";
                    echo "<p> Ultima mossa: ".$_SESSION['lastPos']."</p>";
                    echo "<p> Numero di mosse: ".$_SESSION['contMosse']."</p>";
                ?>

                <table align = 'center' border = '2'>
                    <tr>
                        <td> &nbsp; </td>
                        <td><input type = 'submit' name = 'pos_n' value = 'N'> </td>
                        <td> &nbsp; </td>
                    </tr>
                    <tr>
                        <td><input type = 'submit' name = 'pos_o' value = 'O'> </td>
                        <td> &nbsp; </td>
                        <td><input type = 'submit' name = 'pos_e' value = 'E'> </td>
                    </tr>
                    <tr>
                        <td> &nbsp; </td>
                        <td><input type = 'submit' name = 'pos_s' value = 'S'> </td>
                        <td> &nbsp; </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>