<?php
    session_start();

    if (isset($_POST['logout'])) 
    {
        session_destroy();
        header('Location: login.php');
        exit;
    }

    if (isset($_POST['pagina2'])) 
    {
        if($_SESSION['zioPalla']['livello'] = 0)
        {
            header('Location: ./accesso_negato.php');
        }
        else
        {
            header('Location: ./pagina2.php');
        }
        exit;
    }

    if (isset($_POST['pagina1'])) 
    {
        header('Location: pagina1.php');
        exit;
    }

    if (isset($_POST['pagina3'])) 
    {
        if($_SESSION['zioPalla']['livello'] = 2)
        {
            header('Location: pagina3.php');
        }
        else
        {
            header('Location: ./accesso_negato.php');
        }
        exit;
    }

    if (isset($_POST['pagina4'])) 
    {
        if($_SESSION['zioPalla']['livello'] = 2)
        {
            header('Location: pagina4.php');
        }
        else
        {
            header('Location: ./accesso_negato.php');
        }
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
            <h2> Benvenuto a pagina 2 </h2> <br>
            <form action = "pagina1.php" method = "post">
                <p> Puoi andare nelle seguenti pagine: </p>
                <input type = "submit" name = "pagina1" value = "Pagina 1" class = "btn btn-primary">
                <input type = "submit" name = "pagina3" value = "Pagina 3" class = "btn btn-primary">
                <input type = "submit" name = "pagina4" value = "Pagina 4" class = "btn btn-primary">
                <br><br>
                <input type = "submit" name = "logout" value = "Logout" class = "btn btn-primary">
                <br><br>
                <?php
                    echo "Hai l'accesso alla pagina ".$_SESSION['zioPalla'];
                ?>
            </form>
        </div>
    </body>
</html>