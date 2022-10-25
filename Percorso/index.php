<?php
   session_start();
   
   if(isset($_POST['R']))
   {
	   $_SESSION['riga'] = null;
	   $_SESSION['colonna'] = null;
	   $_SESSION['totale'] = null;
   }

   if(!isset($_SESSION['riga']))
      $_SESSION['riga'] = 4;
   if(!isset($_SESSION['colonna']))
      $_SESSION['colonna'] = 4;
   if(!isset($_SESSION['totale']))
      $_SESSION['totale'] = 0;

   function tabe($ri, $co, $to, $ul)
   {
      echo "<table border = '2'>";
      for($i = 0; $i < 9; $i++)
      {
         echo "<tr>";
         for($j = 0; $j < 9; $j++)
         {
            if(($ri == $i) && ($co == $j))
               echo "<td bgcolor = 'red'> &nbsp;&nbsp;&nbsp;&nbsp; </td>";
            else
               echo "<td> &nbsp;&nbsp;&nbsp;&nbsp; </td>";
         }
         echo "</tr>";
      }
      echo "</table>";
      echo "<br> Ultima mossa: <b>".$ul."</b>";
      echo "<br> Mosse eseguite: <b>".$to."</b>";
   }

   $r = $_SESSION['riga'];
   $c = $_SESSION['colonna'];
   $t = $_SESSION['totale'];
   $u = "Nulla";

   if(isset($_POST['N']))
   {
      if($r > 0)
      {
         $r--;
         $t++;
         $u = "Nord";
      }
   }
   if(isset($_POST['E']))
   {
      if($c < 8)
      {
         $c++;
         $t++;
         $u = "Est";
      }
   }
   if(isset($_POST['S']))
   {
      if($r < 8)
      {
         $r++;
         $t++;
         $u = "Sud";
      }
   }
   if(isset($_POST['O']))
   {
      if($c > 0)
      {
         $c--;
         $t++;
         $u = "Ovest";
      }
   }

   tabe($r,$c,$t,$u);

   $_SESSION['riga'] = $r;
   $_SESSION['colonna'] = $c;
   $_SESSION['totale'] = $t;
?>

<br>

<form name = 'F1' method = 'post' action = 'index.php'>
   <table border = '2'>
      <tr>
         <td> &nbsp; </td>
         <td> <input type = 'submit' name = 'N' value = 'N'> </td>
         <td> &nbsp; </td>
      </tr>
      <tr>
         <td> <input type = 'submit' name = 'O' value = 'O'> </td>
         <td> <input type = 'submit' name = 'R' value = 'R'> </td>
         <td> <input type = 'submit' name = 'E' value = 'E'> </td>
      </tr>
      <tr>
         <td> &nbsp; </td>
         <td> <input type = 'submit' name = 'S' value = 'S'> </td> 
         <td> &nbsp; </td>
      </tr>
   </table>
</form>