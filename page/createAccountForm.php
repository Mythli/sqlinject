<?php
require_once 'include/'.SafePath().'/createAccount.php';

if(!IsUserLoggedIn() && $_GET['action'] == 'createAccount') {
	$createAccountStatus = createAccount($_POST['login'], $_POST['email'], $_POST['password'], $_POST['firstName'], $_POST['lastName']);
}
?>

<div id="myTabContent" class="tab-content">
	<div class="tab-pane active in" id="createAccountForm">
		<form class="form-horizontal" action='index.php?page=createAccountForm&action=createAccount' method="POST">
			<fieldset>
				<div id="legend">
					<legend class="">Account erstellen</legend>
				</div>
				<?php
					if(isset($createAccountStatus)) {
						if($createAccountStatus == TRUE) {
							echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>Accounterstellung erfolgeich!</strong> Account wurde erfolgreich erstellt.</div>';
						} else {
							echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Accounterstellung fehlgeschlagen!</strong> Die Accounterstellung war nicht erfolgreich.</div>';
						}
					}
				?>
				<div class="control-group">
					<!-- Username -->
					<label class="control-label"  for="login">Login</label>
					<div class="controls">
						<input type="text" minlength="3" id="login" name="login" placeholder="Login" class="input-xlarge" />
						<p class="help-block"></p>
					</div>
				</div>

				<div class="control-group">
					<!-- Password-->
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<input type="password" minlength="8" id="password" name="password" placeholder="" class="input-xlarge" />
						<p class="help-block"></p>
					</div>
				</div>

				<div class="control-group">
					<!-- Password-->
					<label class="control-label" for="email">E-Mail</label>
					<div class="controls">
						<input type="email" id="email" name="email" placeholder="E-Mail" class="input-xlarge" />
						<p class="help-block"></p>
					</div>
				</div>

				<div class="control-group">
					<!-- Password-->
					<label class="control-label" for="firstName">Vorname</label>
					<div class="controls">
						<input type="text" minlength="3" id="firstName" name="firstName" placeholder="Vorname" class="input-xlarge" />
						<p class="help-block"></p>
					</div>
				</div>
				
				<div class="control-group">
					<!-- Password-->
					<label class="control-label" for="lastName">Nachname</label>
					<div class="controls">
						<input type="text" minlength="3" id="lastName" name="lastName" placeholder="Nachname" class="input-xlarge" />
						<p class="help-block"></p>
					</div>
				</div>

				<div class="control-group">
					<!-- Button -->
					<div class="controls">
						<button class="btn btn-success">Bestätigen</button>
					</div>
				</div>
			</fieldset>
		</form>                
	</div>
</div>