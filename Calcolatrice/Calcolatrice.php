<html>
   <head>
      <meta charset = "UTF-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
      
      <link rel = "stylesheet" href = "style.css">
   </head>
   <body>
   <h1 style = 'text-align: center;'> Calcolatrice </h1>
      <div id = 'layout'>
         <form name='F1' method='post'>
            <p> A: <input id = 'field' type = 'text' name = 'T1' size = '5' autocomplete='off'> 
            B: <input id = 'field' type = 'text' name = 'T2' size = '5' autocomplete='off'> </p>
            <input id = 'button' type = 'submit' name = 'B1' value = '+'> 
            <input id = 'button' type = 'submit' name = 'B2' value = '-'>
            <input id = 'button' type = 'submit' name = 'B3' value = '*'> 
            <input id = 'button' type = 'submit' name = 'B4' value = '/'>
         </form>
         <?php
            if(isset($_POST['B1']))
            {
               $a = $_POST['T1'];
               $b = $_POST['T2'];
               $c = $a + $b;
               echo "Risultato: ".$c;
            }
            else if(isset($_POST['B2']))
            {
               $a = $_POST['T1'];
               $b = $_POST['T2'];
               $c = $a - $b;
               echo "Risultato: ".$c;
            }
            else if(isset($_POST['B3']))
            {
               $a = $_POST['T1'];
               $b = $_POST['T2'];
               $c = $a * $b;
               echo "Risultato: ".$c;
            }
            else if(isset($_POST['B4']))
            {
               $a = $_POST['T1'];
               $b = $_POST['T2'];
               $c = $a / $b;
               echo "Risultato: ".$c;
            }
         ?>
      </div>
   </body>
</html>