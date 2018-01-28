<?php 
include ("db.php");

if(isset($_POST["id"]))  
 {  
      $output = '';  
       
      $query = " SELECT title, description, image, userID, dateNow FROM news WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($db, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" style="table-layout: fixed;">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= ' 
                <tr>    
                     <td width="100%" style="white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word">'.$row["title"].'</td>  
                </tr> 
                <tr>  
                     
                     <td width="200px" height="200px"><img style="max-height:100%; max-width:100%" src = "admin/images/'.$row["image"].'"</td>  
                </tr> 
                
                <tr>  
                      
                     <td width="200px" style="white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word">'.$row["description"].'</td>  
                </tr>  
                  
                <tr>  
                       
                     <td width="100%">'.$row["userID"].'</td>  
                </tr>  
                <tr>  
                      
                     <td width="100%">'.$row["dateNow"].'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  


   
 ?>