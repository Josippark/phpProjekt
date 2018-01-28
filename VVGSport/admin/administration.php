<?php


	if (isset($_POST['upload'])) {
		// Get image name
		 $id = $_SESSION['user']['username'];
		 $date = date("Y/m/d");
		$title = mysqli_real_escape_string($db,$_POST['title']);

			$image = $_FILES['image']['name'];
		// Get text
			$description = mysqli_real_escape_string($db, $_POST['description']);
			if (isset($_POST['exampleRadios'])){$archive = 1;}else {$archive = 0;}
		// image file directory
			$target = "admin/images/".basename($image);

			$sql = "INSERT INTO news (title, description, image,userID, isArchived, dateNow) VALUES ('$title','$description','$image','$id', '$archive', '$date' )";
		// execute query
			mysqli_query($db, $sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
	}
		$result = mysqli_query($db, "SELECT * FROM news");
	
?>
<div class ="container">
<form action ="" method="post" enctype="multipart/form-data">

			<h2>Insert new post:</h2>
				<div class="form-group row">
				<input type="hidden" id="action" name="action" value="TRUE">
				<label for="title" class="col-2 col-form-label">Title:</label>
				<div class="col-6">
					<input class="form-control" name="title" type="text" placeholder="Title" id="title" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="Description" class="col-2 col-form-label">Description:</label>
				<div class="col-6">
					<textarea class="form-control"  name="description" id="Description" rows="6" cols="50"></textarea>
				</div>
			</div>
			<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" name="image" required>
					<label class="custom-file-label col-md-8" for="image">Choose file</label>
			</div>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios" value="1" >
					<label class="form-check-label" for="exampleRadios">
						Archive
					</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="0">
				<label class="form-check-label" for="exampleRadios1">
						Dont archive
				</label>
				</div>				  
				<div class="container" style="margin-top: 20px">
					<button type="submit" name="upload" value="submit" class="btn btn-primary">Pošalji</button>
				</div>

		</form>
		</div>


 ?>