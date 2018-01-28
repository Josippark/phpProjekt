
<div class="container formaWrapper">
	<?php
	if($_POST['action'] == FALSE){
		?>
		<form action ="" method="post">
			<h2>Fill the registration form:</h2>
				<div class="form-group row">
				<input type="hidden" id="action" name="action" value="TRUE">
			  <label for="name" class="col-2 col-form-label">Name:</label>
			  <div class="col-4">
			    <input class="form-control" name="firstname" type="text" placeholder="First name" id="firstname" required>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="lastName" class="col-2 col-form-label">Last Name:</label>
			  <div class="col-4">
			    <input class="form-control" name="lastname" type="text" placeholder="Last Name" id="lastName" required>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="e-mail" class="col-2 col-form-label">Email</label>
			  <div class="col-4">
			    <input class="form-control" name="email" type="email" placeholder="E-mail" id="e-mail" required>
			  </div>
			</div>
			<div class="form-group row">
		  		<label for="sel1" class="col-2 col-form-label">Choose country:</label>
		  		<div class="col-4">
			  		<select name="country" class="form-control" id="sel1">
			  			<option value="">Choose state</option>
			  			<?php
			  			$query  = "SELECT * FROM countries";
						$result = mysqli_query($db, $query);
						while($row = mysqli_fetch_array($result)) {
							print '<option value="' . $row['country_name'] . '">' . $row['country_name'] . '</option>';
						}

					?>
			  		</select>
			  	</div>
			</div>
			<div class="form-group row">
			  <label for="birth" class="col-2 col-form-label">Date of birth:</label>
			  <div class="col-4">
			    <input class="form-control" name="date" type="date" value="2000-01-01" id="birth" required>
			  </div>
			</div>
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
			<div class="form-group row">
			  <label for="rpassword" class="col-2 col-form-label">Repeat password:</label>
			  <div class="col-4">
			    <input class="form-control" name="rpassword" type="password" placeholder="Password" id="rpassword" required>
			  </div>
			</div>
			
			
			<button type="submit" value="submit" class="btn btn-primary">Submit</button>
			</form>
		<?php } 
		else if ($_POST['action'] == TRUE) {
			if($_POST['password']==$_POST['rpassword']){
				$query  = "SELECT * FROM users";
				$query .= " WHERE email='" .  $_POST['email'] . "'";
				$query .= " OR username='" .  $_POST['username'] . "'";
				$result = @mysqli_query($db, $query);
				$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

				if ($row['email'] == '' || $row['username'] == ''){
					$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
				
					$query  = "INSERT INTO users (name, lastName, email, username, password, countryID, dateOfBirth)";
					$query .= " VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "','" . $_POST['date'] . "')";
					$result = @mysqli_query($db, $query);
					
					# ucfirst() — Make a string's first character uppercase
					# strtolower() - Make a string lowercase
					echo '<p>' . ucfirst(strtolower($_POST['firstname'])) . ' ' .  ucfirst(strtolower($_POST['lastname'])) . ', thank you for registration </p>
					<hr>';
				}
				else {
					echo "<div class='alert alert-danger my-sm-2' style ='margin:0 auto; width:400px;' role='alert'>
  							Username or email already exists , try again!
						</div>
						<div style='margin:0 auto; width:100px;'><button class='btn btn-primary' onclick='goBack()'> Go Back </button></div>";
					}
				}
				else{
					echo "<div class='alert alert-danger my-sm-2' style ='margin:0 auto; width:400px;' role='alert'>
  							Passwords are not matching!
						</div>
						<div style='margin:0 auto; width:100px;'><button class='btn btn-primary' onclick='goBack()'> Go Back </button></div>";
					
					
				}
		}

			?>
	</div>