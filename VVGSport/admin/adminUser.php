		<?php 
			$query  = "SELECT * FROM users";
			$query .= " WHERE id=".$_SESSION['user']['id'];
			$result = @mysqli_query($db, $query);
			$row = @mysqli_fetch_array($result);
			?>
		<div class="container formaWrapper" >
			<?php
			if($_POST['action'] == FALSE){
			?>
			<form action ="" method="post">
			<h2>Edit info (after edit you will
			<br> need to log in again!)</h2>
				<div class="form-group row">
				<input type="hidden" id="action" name="action" value="TRUE">
			  <label for="name" class="col-2 col-form-label">Name:</label>
			  <div class="col-6">
			    <input class="form-control" name="firstname" type="text"  id="firstname" value = "<?php echo $row['name']?>" required>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="lastName" class="col-2 col-form-label">Last Name:</label>
			  <div class="col-6">
			    <input class="form-control" name="lastname" type="text"  id="lastName" value = "<?php echo $row['lastName']?>" required>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="e-mail" class="col-2 col-form-label">Email</label>
			  <div class="col-6">
			    <input class="form-control" name="email" type="email" id="e-mail" value ="<?php echo $row['email']?>" required>
			  </div>
			</div>
			<div class="form-group row">
		  		<label for="sel1" class="col-2 col-form-label">Choose country:</label>
		  		<div class="col-6">
			  		<select name="country" class="form-control" id="sel1">
			  			<option value="<?php echo $row["countryID"]?>"></option>
			  			<?php
			  			$query1  = "SELECT * FROM countries";
							$result1 = mysqli_query($db, $query1);
							while($row1 = mysqli_fetch_array($result1)) {
							print '<option value="' . $row1['country_name'] . '">' . $row1['country_name'] . '</option>';
						}

					?>
			  		</select>
			  	</div>
			</div>
			<div class="form-group row">
			  <label for="birth" class="col-2 col-form-label">Date of birth:</label>
			  <div class="col-6">
			    <input class="form-control" name="date" type="date" id="birth" value = "<?php echo $row['dateOfBirth']?>" required>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="username" class="col-2 col-form-label">Username:</label>
			  <div class="col-6">
			    <input class="form-control" name="username" type="text"  id="username" value = "<?php echo $row['username']?>" required>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="password" class="col-2 col-form-label">Password:</label>
			  <div class="col-6">
			    <input class="form-control" name="password" type="password"  id="password"  required>
			  </div>
			</div>
			<div class="form-group row">
			  <label for="rpassword" class="col-2 col-form-label">Repeat password:</label>
			  <div class="col-6">
			    <input class="form-control" name="rpassword" type="password"  id="rpassword" required>
			  </div>
			</div>
			
			
			<button type="submit" value="submit" class="btn btn-primary">Submit</button>
			</form>
			<form action ="" method="post">
				<button type="submit" name="deactivate" value="submit" class="btn btn-danger my-sm-2" onclick="">Deactivate account</button>
			</form>
		<?php } 
		else if ($_POST['action'] == TRUE) {
			if($_POST['password']==$_POST['rpassword']){
				$query  = "SELECT * FROM users";
				$query .= " WHERE email='" .  $_POST['email'] . "'";
				$query .= " OR username='" .  $_POST['username'] . "'";
				$result = @mysqli_query($db, $query);
				$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);

				if ($row['email'] == '' || $row['username'] == '' || $row['email'] == $_SESSION['user']['email'] || $row['username'] == $_SESSION['user']['username']){
					$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
				
					$query  = "UPDATE users SET name='" . $_POST['firstname'] . "', lastName='" . $_POST['lastname'] . "', email='" . $_POST['email'] . "', countryID='" . $_POST['country'] . "', dateOfBirth='" . $_POST['date'] . "', username='" . $_POST['username'] . "',password='" . $pass_hash . "'";
       			$query .= " WHERE id=" . $_SESSION['user']['id'];
        	$query .= " LIMIT 1";
					$result = @mysqli_query($db, $query);
					
					# ucfirst() — Make a string's first character uppercase
					# strtolower() - Make a string lowercase
					unset($_SESSION['user']);
					$_SESSION['user']['valid'] = 'false';
					echo '<p>' . ucfirst(strtolower($_POST['firstname'])) . ' ' .  ucfirst(strtolower($_POST['lastname'])) . ', you updated your profile succesfully!' .'</p>';

					header("Location: index.php?menu=1");
					
				}
				else {
					echo "<p>User with this email or username already exist!</p>
					<button onclick='goBack()'>Go Back</button>";
					}
				}
				else{
					echo "<div class='alert alert-warning' role='alert'>
  							Password are not matching! Please try again!
						</div>
						<button onclick='goBack()'>Go Back</button>";
					
					
				}
		}

			?>
	</div>

