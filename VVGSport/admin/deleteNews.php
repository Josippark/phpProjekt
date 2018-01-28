<?php

include ("../db.php");

if(isset($_POST["id"]))  
 {  
  
    $query = "DELETE FROM news
    WHERE id = '".$_POST["id"]."'";
    mysqli_query($db,$query);  
      
 }
 ?>