<?php

require_once("db.php"); //ukljucivanje konekcije na bazu
session_start();
if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; } //pretvaranje u integer radi usporedjivanja poslje
if(!isset($_POST['action']))  { $_POST['action'] = FALSE;  } //ako nije poslana akcija, defaultno je false
if(isset($_GET['action'])) { $action   = (int)$_GET['action']; } //pretvaranje u integer radi usporedjivanja poslje


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta description = "Vvg projekt stranica" author="Josip Pavlovic,IS 1.semestar">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link href="css/style.css" rel ="stylesheet">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
   <script>tinymce.init({ selector:'textarea' });</script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
    <title>Sport news</title>
</head>
  <body>
      <div class="jumbotron jumbotron-fluid" style="margin-bottom: 0">
        <div class="container">
          <h1 class="display-5">VVGSport</h1>
          <p class="lead">Connect with all sport fanatics and enjoy in sharing latest sport news!</p>
        </div>
      </div>   
       <?php include("menu.php");?>

 <main>
  
    <?php
    # Homepage
    if (!isset($menu) || $menu == 1) { include("news.php"); }
    
    # News
    else if ($menu == 2) { include("adminMenu.php"); }
    
    # Contact
    else if ($menu == 3) { include("aboutUs.php"); }
    
    # About us
    else if ($menu == 4) { include("registration.php"); }
    
    # Register
    else if ($menu == 5) { include("login.php"); }
    
    # Signin
    else if ($menu == 6) { include("logout.php"); }
    
   
    ?>

</main>


<?php include("scripts/script.php");?>
<script>
$(document).ready(function(){  
      $('.view_data').click(function(){  
          id = $(this).attr("id");  
          $.ajax({  
                url:"viewNews.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                     $('#vijesti').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 $(document).ready(function(){  
      $('.Archive').click(function(){  
          id = $(this).attr("id");  
          $.ajax({  
                url:"admin/archiveNews.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                  location.reload();   
                }  
           });  
      });  
 }); 
 $(document).ready(function(){  
      $('.NotArchive').click(function(){  
          id = $(this).attr("id");  
          $.ajax({  
                url:"admin/notArchive.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                  location.reload();   
                }  
           });  
      });  
 });  
 $(document).ready(function(){  
      $('.delete').click(function(){  
          id = $(this).attr("id");  
          $.ajax({  
                url:"admin/deleteNews.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                  location.reload();   
                }  
           });  
      });  
 });  

 </script>
</body>
</html>