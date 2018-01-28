<?php 
	if ($_SESSION['user']['valid'] == 'true') {
		if (!isset($action)) { $action = 1; }
		?>
			<ul class="nav justify-content-center">
			  <li class="nav-item">
			    <a class="nav-link active" href="index.php?menu=2&amp;action=3">Edit news</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="index.php?menu=2&amp;action=1">Insert news</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="index.php?menu=2&amp;action=2">Edit info</a>
			  </li>
			  

			 
			</ul>
		<?php
			if ($action == 1) { include("admin/administration.php"); }
			else if ($action == 2) { include("admin/adminUser.php"); }
			else if ($action == 3) { include("admin/InsertNews.php"); }
	}
		else  {

		echo "<div class='alert alert-danger my-sm-2' style ='margin:0 auto; width:400px;' role='alert'>
  			You need to login or register so you can share news!
			</div>";
			
					
		}

	?>