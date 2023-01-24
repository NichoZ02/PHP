<?php
    session_start();

    if (!isset($_SESSION['selectedUser'])) 
    {
        header('Location: ./login.php');  
    }

    if (isset($_POST['logout']))  
    {
        session_destroy();
        header('Location: ./login.php');   
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Pagina 1 </title>
        <link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel = "stylesheet">
    </head>
    <body>
        <div align = "center" class = "box" id = "sfondo">
            <h2> Benvenuto nella pagina</h2>
            <?php
                echo "Nome: ".$_SESSION['selectedUser']['Nome']."<br>";
                echo "Cognome: ".$_SESSION['selectedUser']['Cognome']."<br>";
                echo "Username: ".$_SESSION['selectedUser']['Username']."<br>";
            ?>
            <br>
            <form action = "page.php" method = "post">
                <input type = "submit" name = "logout" value = "Effetua il logout" class = "btn btn-dark">
            </form>
            <br><br>
        </div>
    </body>
</html>