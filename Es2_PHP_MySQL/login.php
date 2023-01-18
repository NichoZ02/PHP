<?php
    session_start();

    if(isset($_POST['login']) || isset($_POST['signup']))
    {
        $mysqli = new mysqli("localhost", "root", "", "sito");
        if ($mysqli -> connect_errno) 
        {
            echo "non si connette: (".$mysqli -> connect_errno.")".$mysqli -> connect_error;
        }
        if(isset($_POST['login']))
            if()
        if(isset($_POST['I2']))
            $query = "SELECT Voti.voto 
            FROM Voti
            WHERE Voti.voto < ".(int)$_POST['max']." AND Voti.voto > ".(int)$_POST['min'].";";
        if(isset($_POST['I3']))
            $query = "SELECT Studenti.nome, Studenti.cognome, MAX(Voti.voto) AS voto_massimo, MIN(Voti.voto) AS voto_minimo
            FROM Voti
            INNER JOIN Studenti ON Voti.ID_Studenti = Studenti.ID_Studenti
            GROUP BY Studenti.ID_Studenti 
            ORDER BY Studenti.nome, Studenti.cognome;";
    }	   
?>

<!--
    - visualizzare i voti di uno specifico studente;
    - visualizzare i voti compresi tra un massimo e un minimo;
    - visualizzare il voto minimo e il voto massimo per ciascuno studente.
-->

<html>
    <head>
        <title> Es 2 PHP e MySQL </title>
        <link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel = "stylesheet">
    </head>
    <body>
        <div id = 'sfondo' class = 'form-group'>
                <form name = 'F1' method = 'post' action = '<?php echo $_SERVER['PHP_SELF']; ?>'>
                    Username: <input type = 'text' name = 'username' size = '10px'>
                    <br><br>
                    Password: <input type = 'password' name = 'password' size = '10px'>
                    <br><br>
                    <input type = 'submit' name = 'signup' value = 'Registrati' class = 'btn btn-link;'>
                    <input type = 'submit' name = 'login' value = 'Accedi' class = 'btn btn-dark'>
                </form>
        </div>  

        <?php
            if(isset($_POST['login']) || isset($_POST['signup']) || isset($_POST['I3']))
            {
                if (!$risultato = $mysqli -> query($query)) 
                {
                    echo $query;
                }

                echo "<br>";
                echo "<br>";

                echo "<table border = '1'>";
                    echo "<tr>";
                        for($i = 0; $i < $risultato -> field_count; $i++)
                        {
                            echo "<td><b>".$risultato -> fetch_field_direct($i) -> name."</b></td>";
                        }
                    echo "</tr>";
                    while ($row = $risultato -> fetch_row()) 
                    {
                        echo "<tr>";
                            for($i = 0; $i < $risultato -> field_count; $i++)
                            {
                                echo "<td>".$row[$i]."</td>";
                            }
                        echo "</tr>";
                    }
                echo "</table>";
            } 
        ?>
    </body>
</html>