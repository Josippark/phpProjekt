<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="index.php?menu=1">News</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="index.php?menu=2">Administration</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="index.php?menu=3">About us</a>
      </li>
    </ul>
      <ul class="navbar-nav" >
        <?php 
          if(!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') 
          {
        ?>
        <li class="nav-item ">
          <button class="btn btn-sm btn-success mr-sm-2"><a class="nav-link" href="index.php?menu=4">Register</a></button>
        </li>
        <li class="nav-item ">
          <button class="btn btn-sm btn-success"><a class="nav-link" href="index.php?menu=5">Login</a></button>
        </li>
        <?php
        }
          else if ($_SESSION['user']['valid'] == 'true') {

        ?>
        <li class="nav-item" style="margin-top: 10px;">
          <h5 style="color:white" class="mr-sm-5" ><?php echo "Dobrodošli " .$_SESSION['user']['firstname'] . " " . $_SESSION['user']['lastname'];?></h4>
        </li>
        
        <li class="nav-item ">
          <button class="btn btn-sm btn-warning mr-sm-2" ><a class="nav-link" style="color:black;" href="index.php?menu=6">Logout</a></button>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
</nav>