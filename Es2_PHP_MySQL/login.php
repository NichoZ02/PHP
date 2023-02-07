<?php
    session_start();

    $query="";

    if (isset($_POST['login']))    //se viene cliccato il tasto di login ("Accedi")
    {  
        $database=new mysqli("localhost", "root", "", "sito");  //recupera il database
        if ($database -> connect_errno) {
            echo "non si connette: (".$database -> connect_errno.")".$database -> connect_error;
        }
        foreach($database -> query("SELECT * FROM Utenti WHERE 1") as $user)    //cerca l'utente con la relativa password
        {
            if (($user['Username'] == $_POST['username']) && ($user['Password'] == $_POST['password'])) //quando viene trovato
            {
                $_SESSION['selectedUser']=$user;  //prende i dati dell'utente dal database e li mette in un array di sessione
                header("location: ./page1.php");  //va alla pagina 1
            }
        }
        // se il ciclo finisce l'utente è inesistente o la password è errata
        echo "<script type = 'text/javascript'> alert('Username e/o Password errati'); </script>";
    }

    if (isset($_POST['guest']))     //se viene cliccato il tasto di login as guest ("Accedi come ospite")
    {
        $_SESSION['selectedUser'] = array('Nome' => 'utente', 'Cognome' => 'ospite', 'Username' => 'utenteospite', 'Password' => null, 'Livello' => 0);
        header("location: ./page1.php");  //va alla pagina 1
    }

    if (isset($_POST['signUp']))    //se viene cliccato il tasto di signup ("Registrati")
    {
        header("location: ./signup.php");    //va alla pagina di registrazione
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel = "stylesheet">
    </head>
    <body>
        <div align = "center" class = "box" id = "sfondo">
            <h2> Esegui l'accesso per continuare </h2> 
            <br>
            <form action = "login.php" method = "post">
                <p> Username: <input type = "text" name = "username" size = "40" required></p>
                <p> Password: <input type = "password" name = "password" size = "40" required></p>
                <p> <input type = "submit" name = "login" value = "Accedi" class = "btn btn-dark"> </p>
            </form>
            <form action = "login.php" method = "post">
                <p> <input type = "submit" name = "guest" value = "Accedi come ospite" class = "btn btn-dark"></p>
                <p> <input type = "submit" name = "signUp" value = "Registrati" class = "btn btn-dark"></p>
            </form>
        </div>
    </body>
</html>