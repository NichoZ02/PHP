<?php

$p = 0;

if(isset($_POST['B']))
{
   $p = $_POST['P'];

}

?>

<html>
   <head>
      <meta charset = "UTF-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
      
      <link rel = "stylesheet" href = "style.css">
   </head>
   <body>

   <form name = 'F1' method = 'POST' action = 'index.php'>
      <p> Numero di partite: </p>
      <input type = 'text' name = 'P' size = '5' value = '<?php echo $p; ?>' />
      <input type = 'submit' name = 'B' value = 'matrice'/>
   </form>

   <br><br><br>

   <table align = "center" border= "2">

      <tr>
         <td> Giocatore 1 </td>
         <td> Giocatore 2 </td>
         <td> Risultato </td>
      </tr>

      <?php

         for($j = 0; $j < $p; $j++)
         {
            echo "<tr>";
            for($i = 0; $i < 3; $i++)
            {
               $t=mt_rand(1, 6);
               echo "<td>".$t."</td>";
            }
            echo "</tr>";
         }

      ?>

   </table>

   </body>
</html>