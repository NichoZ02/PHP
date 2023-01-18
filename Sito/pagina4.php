<?php
    if (isset($_POST['logout'])) 
    {
        session_destroy();
        header('Location: login.php');
        exit;
    }

    if (isset($_POST['pagina2'])) 
    {
        header('Location: pagin2.php');
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
            <h2> Benvenuto a pagina 1 </h2> <br>
            <form action = "pagina1.php" method = "post">
                <p> Puoi andare nelle seguenti pagine: </p>
                <input type = "submit" name = "logout" value = "Logout" class = "btn btn-primary">
                <input type = "submit" name = "pagina2" value = "Pagina 2" class = "btn btn-primary">
            </form>
        </div>
    </body>
</html>