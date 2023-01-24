<?php
    session_start();
    
    if (isset($_POST['signup']))
    {   
        $database = new mysqli("localhost", "root", "", "sito");
        $esiste = false;
        foreach($database -> query("SELECT * FROM utenti WHERE 1") as $user)
        {
            if ($user['Username'] == $_POST['username'])
            {
                echo "<script language = 'javascript'> alert('Username già utilizzato da un altro utente.'); </script>";
                $esiste = true;
                break;
            }
        }
        if (!$esiste) 
        {
            $database -> query("INSERT INTO `utenti` (`Nome`, `Cognome`, `Username`, `Password`) 
            VALUES ('".$_POST['name']."', '".$_POST['surname']."', '".$_POST['username']."', '".$_POST['password']."');");
            echo "<script language = 'javascript'> alert('Utente registrato con successo.'); </script>";
            header("Location: ./login.php");  
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Registrazione </title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel = "stylesheet">
    </head>
    <body>
        <div align = "center" class = "box" id = "sfondo">
            <h2> Registrati al sito </h2> <br>
            <form action = "signup.php" method = "post">
                <p> Nome: <input type = "text" name = "name" size = "40" required></p>
                <p> Cognome: <input type = "text" name = "surname" size = "40" required></p>
                <p> Username: <input type = "text" name = "username" size = "40" required></p>
                <p> Password: <input type = "password" name = "password" size = "40" required></p>
                <p> <input type = "submit" name = "signup" value = "Registrati" class = "btn btn-dark"> </p>
            </form>
            <form action = "login.php" method = "post">
                <p> <input type = "submit" name = "login" value = "Torna al login" class = "btn btn-dark"> </p>
            </form>
        </div>
    </body>
</html>