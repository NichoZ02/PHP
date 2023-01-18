<?php
    session_start();

    if(isset($_POST['reset']))
    {
        $_SESSION['utente'] = null;
        $_SESSION['cont'] = null;
    }

    if(!isset($_SESSION['utente']))
    {
        $_SESSION['utente'] = array(
                array(
                    'nome' => 'utente', 
                    'cognome' => 'ospite', 
                    'username' => 'utenteospite', 
                    'password' => null, 
                    'livello' => 0
                ),
                array(
                    'nome' => 'Paolo', 
                    'cognome' => 'Rossi', 
                    'username' => 'PRED', 
                    'password' => '1234', 
                    'livello' => 1
                ),
                array(
                    'nome' => 'Nicholas', 
                    'cognome' => 'Valenzano', 
                    'username' => 'NichoZ', 
                    'password' => '6969', 
                    'livello' => 2
                )
            );
        $_SESSION['cont'] = 3;
        $_SESSION['zioPalla']=null;
    }
   

    if(isset($_POST['signIn']))
    {
        if(($_POST['username'] != "") && ($_POST['password'] != ""))
        {       
            foreach($_SESSION['utente'] as $user)
            {
                if(($user['username'] == $_POST['username']) && ($user['password'] == $_POST['password']))
                {
                    $_SESSION['zioPalla'] = $user;
                    header("location: ./pagina1.php");
                }
            }
            echo "<script type = 'text/javascript'> alert('Username e/o Password errati'); </script>";
        }
        else
        {
            echo "<script type = 'text/javascript'> alert('Alcuni dati sono mancanti'); </script>";
        }
    }

    if(isset($_POST['guest']))
    {
        $_SESSION['zioPalla'] = $_SESSION['utente'][0];
        header("location: ./pagina1.php");
    }

    if(isset($_POST['signUp']))
    {
        header("location: ./registrazione.php");
    }
?>
<!doctype html>
<html>
    <head>
        <title> Sito con login </title>
        <link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel = "stylesheet">
    </head>
    <body>
        <div align = "center" class = "box">
            <h2> Benvenuto esegui l'accesso per continuare </h2> <br>
            <form action = "login.php" method = "post">
                <p> Username: <input type = "text" name = "username" size = "40"></p>
                <p> Password: <input type = "password" name = "password" size = "40"></p>
                <p>
                    <input type = "submit" name = "signIn" value = "Accedi" class = "btn btn-primary">
                    <input type = "reset" name = "cancella" value = "Cancella" class = "btn btn-primary"> <br><br>
                    <input type = "submit" name = "signUp" value = "Registrati" class = "btn btn-primary"> <br><br>
                    <input type = "submit" name = "guest" value = "Accedi come ospite" class = "btn btn-primary"><br><br>
                    <input type = "submit" name = "reset" value = "Reset" class = "btn btn-primary">
                </p>
            </form>
        </div>
    </body>
</html>