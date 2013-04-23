<?php
if(!IsUserLoggedIn() && $_GET['action'] == 'createAccount') {
	$login = mysql_real_escape_string($_POST['login']);
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	$firstName = mysql_real_escape_string($_POST['firstName']);
	$lastName = mysql_real_escape_string($_POST['lastName']);
	
	$userExists = FALSE;

	$sql = "
		select
			count(*) as userCount
		from
			user
		where
			login = ".$login." or
			email = ".$email.";
	";

	$result = mysql_query($sql)
		or die('Failed to execute query '.$sql.': ' . mysql_error());
	$row = mysql_fetch_assoc($result);
	if($row['userCount'] < 0) {
		if(IsSafe()) {
			// hash password
		}
	} else {
		$userExists = TRUE;
	}
}
?>

<div id="myTabContent" class="tab-content">
	<div class="tab-pane active in" id="login">
		<form class="form-horizontal" action='index.php?page=createAccountForm&action=createAccount' method="POST">
			<fieldset>
				<div id="legend">
					<legend class="">Login</legend>
				</div>
				<div class="control-group">
					<!-- Username -->
					<label class="control-label"  for="username">Username</label>
					<div class="controls">
						<input type="text" id="username" name="username" placeholder="" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<!-- Password-->
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<input type="password" id="password" name="password" placeholder="" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<!-- Password-->
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<input type="password" id="password" name="password" placeholder="" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<!-- Password-->
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<input type="password" id="password" name="password" placeholder="" class="input-xlarge">
					</div>
				</div>

				<div class="control-group">
					<!-- Button -->
					<div class="controls">
						<button class="btn btn-success">Login</button>
					</div>
				</div>
			</fieldset>
		</form>                
	</div>
</div>