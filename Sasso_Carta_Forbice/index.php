<?php
   $p = 0;
   $t = ['Carta', 'Sasso', 'Forbice'];

   function risultato($g1, $g2)
   {
      if($g1 == 0 && $g2 == 1)
      {
         return "Giocatore 1 vince";
      }
      else if($g1 == 0 && $g2 == 2)
      {
         return "Giocatore 2 vince";
      }
      else if($g1 == 0 && $g2 == 0)
      {
         return "Pareggio";     
      }
      if($g1 == 1 && $g2 == 2)
      {
         return "Giocatore 1 vince";
      }
      else if($g1 == 1 && $g2 == 0)
      {
         return "Giocatore 2 vince";
      }
      else if($g1 == 1 && $g2 == 1)
      {
         return "Pareggio";
      }
      if($g1 == 2 && $g2 == 0)
      {
         return "Giocatore 1 vince";
      }
      else if($g1 == 2 && $g2 == 1)
      {
         return "Giocatore 2 vince";
      }
      else if($g1 == 2 && $g2 == 2)
      {
         return "Pareggio";
      }

   }

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
   <body align = "center">
      <form name = 'F1' method = 'POST' action = 'index.php'>
         <p> Numero di partite: </p>
         <input type = 'text' name = 'P' size = '5' value = '<?php echo $p; ?>' />
         <input type = 'submit' name = 'B' value = 'Genera'/>
      </form>

      <br><br><br>

      <table align = "center" border= "2">

         <tr>
            <td width = "250px" padding = "3px"> Giocatore 1 </td>
            <td width = "250px" padding = "3px"> Giocatore 2 </td>
            <td width = "250px" padding = "3px"> Risultato </td>
         </tr>

         <?php  
            for($j = 0; $j < $p; $j++)
            {
               $g1 = rand(0, 2);
               $g2 = rand(0, 2);

               echo "<tr>";
                  echo "<td width = '250px' padding = '3px'>".$t[$g1]."</td>";
                  echo "<td width = '250px' padding = '3px'>".$t[$g2]."</td>";
                  echo "<td width = '250px' padding = '3px'>".risultato($g1, $g2)."</td>";
               echo "</tr>";
            }
         ?>
      </table>
   </body>
</html>
