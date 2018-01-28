<?php

if ($_POST['action'] == FALSE) {
	?>
	<div class="container formaloginWrapper">
		<h1 class="my-sm-2">Feel free to login!</h1>
		<form action ="" method="post">
			<input type="hidden" id="action" name="action" value="TRUE">
			<div class="form-group row">
				<label for="username" class="col-2 col-form-label">Username:</label>
				<div class="col-4">
					<input class="form-control" name="username" type="text" placeholder="Username" id="username" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-2 col-form-label">Password:</label>
				<div class="col-4">
				<input class="form-control" name="password" type="password" placeholder="Password" id="password" required>
				</div>
			</div>
			<button type="submit" value="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<?php
}
	else if($_POST["action"] == TRUE){

		$query  = "SELECT * FROM users";
		$query .= " WHERE username='" .  $_POST['username'] . "'";
		$result = @mysqli_query($db, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if (password_verify($_POST['password'], $row['password'])) {
			#password_verify https://secure.php.net/manual/en/function.password-verify.php
			$_SESSION['user']['valid'] = 'true';
			$_SESSION['user']['id'] = $row['id'];
			$_SESSION['user']['firstname'] = $row['name'];
			$_SESSION['user']['lastname'] = $row['lastName'];
			$_SESSION['user']['email'] = $row['email'];
			$_SESSION['user']['username'] = $row['username'];
			$_SESSION['message'] = '<p>Dobrodošli, ' . $_SESSION['user']['name'] . ' ' . $_SESSION['user']['lastName'] . '</p>';
			# Redirect to admin website
			header("Location: index.php?menu=2");
		}
		
		# Bad username or password
		else {
			unset($_SESSION['user']);
			echo "<div class='alert alert-danger my-sm-2' style ='margin:0 auto; width:400px;' role='alert'>
  							Username or password is wrong , try again!
						</div>
						<div style='margin:0 auto; width:100px;'><button class='btn btn-primary' onclick='goBack()'> Go Back </button></div>";
					
			}
		
	}?>

