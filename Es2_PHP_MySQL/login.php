<?php
    session_start();

    $query="";

    if (isset($_POST['login'])) 
    {  
        $database = new mysqli("localhost", "root", "", "sito");
        if ($database -> connect_errno) {
            echo "non si connette: (".$database -> connect_errno.")".$database -> connect_error;
        }
        foreach($database -> query("SELECT * FROM utenti WHERE 1") as $user)
        {
            if (($user['Username'] == $_POST['username']) && ($user['Password'] == $_POST['password']))
            {
                $_SESSION['selectedUser'] = $user; 
                header("location: ./page.php"); 
            }
        }
        echo "<script type = 'text/javascript'>alert('Username e/o Password errati');</script>";
    }

    if (isset($_POST['signup']))   
    {
        header("location: ./signup.php"); 
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
            <h2> Esegui il login per continuare </h2> <br>
            <form action = "login.php" method = "post">
                <p> Username: <input type = "text" name = "username" size = "40" required></p>
                <p> Password: <input type = "password" name = "password" size = "40" required></p>
                <p> <input type = "submit" name = "login" value = "Accedi" class = "btn btn-dark"> </p>
            </form>
            <form action = "login.php" method = "post">
                <p> <input type = "submit" name = "signup" value = "Registrati" class = "btn btn-dark"> </p>
            </form>
        </div>
    </body>
</html>