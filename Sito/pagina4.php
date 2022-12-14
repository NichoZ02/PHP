<?php
    if (isset($_POST['logout'])) 
    {
        session_destroy();
        header('Location: login.php');
        exit;
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
            <h2> Benvenuto a pagina 4 </h2> <br>
            <form action = "pagina1.php" method = "post">
                <p> Username: <input type = "text" name = "username" size = "40"></p>
                <p> Password: <input type = "password" name = "password" size = "40"></p>
                <p>
                    <input type = "submit" name = "signIn" value = "Accedi" class = "btn btn-primary">
                    <input type = "reset" name = "cancella" value = "Cancella" class = "btn btn-primary"> <br><br>
                    <input type = "submit" name = "signUp" value = "Registrati" class = "btn btn-primary"> <br><br>
                    <input type = "submit" name = "guest" value = "Accedi come ospite" class = "btn btn-primary">
                    <input type = "submit" name = "logout" value = "Logout" class = "btn btn-primary">
                </p>
            </form>
        </div>
    </body>
</html>