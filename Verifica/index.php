<?php
    session_start();
    // Inizializza.
    $righe = 10;
    $colonne = 10;
    if( !isset( $_SESSION['tabella'] ) || isset( $_POST['reset'] ) ) {
        $_SESSION['contatore'] = 0;
        $_SESSION['tabella'] = array();
        $_SESSION['contRighe'] = array();
        // Crea tabella.
        for( $i=0; $i<$righe; $i++ ) {
            for( $j=0; $j<$colonne; $j++ ) {
                $_SESSION['tabella'][$i][$j] = '<td style="background: red;"><input type="submit" class="bottone" style="background-color: red;" name="c' . $i . $j . '" value=""></td>';
            }
            $_SESSION['contRighe'][$i] = 0;
        }
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica individuale</title>
</head>
<body>
    <style>
        table {
            border: 1px solid black;
        }
        .bottone {
            border: none;
            height: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        td {
            border: 1px solid black;
            width: 20px;
            height: 20px;
        }
        .mgn-t {
            margin-top: 10px;
        }
    </style>
    <form name="tabella" method="POST">
        <?php 
            echo '<table>';
            for( $i=0; $i<$righe; $i++ ) {
                for( $j=0; $j<$colonne; $j++ ) {
                    if( isset( $_POST['c' . $i . $j . ''] ) ) {
                        $_SESSION['tabella'][$i][$_SESSION['contRighe'][$i]] = "<td style='background-color: white;'>&nbsp;&nbsp;&nbsp;</td>";
                        $_SESSION['contRighe'][$i]++;
                        $_SESSION['contatore']++;
                    }
                }
            }
            for( $i=0; $i<$righe; $i++ ) {
                echo '<tr>';
                for( $j=0; $j<$colonne; $j++ ) {
                    // Mostra la tabella.
                    echo $_SESSION['tabella'][$i][$j];
                }
                echo '</tr>';
            }
            echo '</table>';
        ?>
        <input class="mgn-t" type="submit" name="reset" value="Reset">
        <p class="mgn-t">Eliminati: <?php echo $_SESSION['contatore']; ?></p>
    </form>
</body>
</html>