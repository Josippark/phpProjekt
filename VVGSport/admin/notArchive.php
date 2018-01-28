<?php

include ("../db.php");

if(isset($_POST["id"]))  
 {  
        
       
      $query = " UPDATE news SET isArchived = 1 WHERE id = '".$_POST["id"]."'";  
      mysqli_query($db, $query);  
 }
 ?>