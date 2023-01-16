<?php
    $query = "";

    if(isset($_POST['I1']) || isset($_POST['I2']) || isset($_POST['I3']))
    {
        $mysqli = new mysqli("localhost", "root", "", "scuola");
        if ($mysqli -> connect_errno) 
        {
            echo "non si connette: (".$mysqli -> connect_errno.")".$mysqli -> connect_error;
        }
        if(isset($_POST['I1']))
            $query = "SELECT Studenti.nome, Studenti.cognome, Voti.voto 
            FROM Voti
            INNER JOIN Studenti ON Voti.ID_Studenti = Studenti.ID_Studenti
            WHERE Studenti.cognome = '".$_POST['studente']."';";
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
    <body>
        <form name = 'F1' method = 'post' action = '<?php echo $_SERVER['PHP_SELF']; ?>'>
            <p> Visualizza voti di uno specifico studente inserendo il cognome </p>
            <input type = 'text' name = 'studente'>
            <br><br>
            <input type = 'submit' name = 'I1' value = 'Visualizza voti'>
            <br><br>
            <p> Inserisci 2 numeri e visualizza i voti compresi tra i due numeri
            <p> Inserisci numero più alto </p> <input type = 'text' name = 'max'>
            <p> Inserisci numero più basso </p> <input type = 'text' name = 'min'>
            <br><br>
            <input type = 'submit' name = 'I2' value = 'Visualizza voti'>
            <br><br>
            <p> Visualizza il voto più alto e il voto più basso di ogni specifico studente </p>
            <input type = 'submit' name = 'I3' value = 'Visualizza voti'>
        </form>

        <?php
            if(isset($_POST['I1']) || isset($_POST['I2']) || isset($_POST['I3']))
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