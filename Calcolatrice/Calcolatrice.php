<html>
   <head>
      <link href>
   </head>
   <body>
         <h1> Calcolatrice </h1>

         <form name='F1' method='post'>
            A: <input type = 'text' name = 'T1' size = '5'> B: <input type = 'text' name = 'T2' size = '5'>
            <input style = "font-size: 20px; margin: 10px" type = 'submit' name = 'B1' value = '+'> 
            <input style = "font-size: 20px; margin: 10px" type = 'submit' name = 'B2' value = '-'>
            <input style = "font-size: 20px; margin: 10px" type = 'submit' name = 'B3' value = '*'> 
            <input style = "font-size: 20px; margin: 10px" type = 'submit' name = 'B4' value = '/'>
         </form>

         <?php
            if(isset($_POST['B1']))
            {
               $a = $_POST['T1'];
               $b = $_POST['T2'];
               $c = $a + $b;
               echo "Risultato:"." ".$c;
            }
            if(isset($_POST['B2']))
            {
               $a = $_POST['T1'];
               $b = $_POST['T2'];
               $c = $a - $b;
               echo "Risultato:"." ".$c;
            }
            if(isset($_POST['B3']))
            {
               $a = $_POST['T1'];
               $b = $_POST['T2'];
               $c = $a * $b;
               echo "Risultato:"." ".$c;
            }
            if(isset($_POST['B4']))
            {
               $a = $_POST['T1'];
               $b = $_POST['T2'];
               $c = $a / $b;
               echo "Risultato:"." ".$c;
            }
         ?>
      </body>
</html>