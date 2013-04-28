<div id="myTabContent" class="tab-content">
	<div class="tab-pane active in" id="loginForm">
		<form class="form-horizontal" action='index.php?page=login&action=login' method="POST">
			<fieldset>
				<div id="legend">
					<legend class="">Login</legend>
				</div>
				<?php 
				if (IsUserLoggedIn()) {
					if ($_GET['action'] == 'login') {
						echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>Erfolgreich eingeloggt!</strong> Sie haben sich erfolgreich als <strong>'.$_SESSION['loginData']['login'].'</strong> eingeloggt.</div>';
					}
				} else {
					if ($_GET['action'] == 'logout') {
						echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a><strong>Erfolgreich ausgeloggt!</strong> Sie haben sich erfolgreich ausgeloggt.</div>';
					}
					if($_GET['action'] == 'login') {
						echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Login fehlgeschlagen!</strong> Der login ist fehlgeschlagen.</div>';
					}
					?>
					<div class="control-group">
						<!-- Username -->
						<label class="control-label"  for="login">Login</label>
						<div class="controls">
							<input type="text" minlength="3" id="login" name="login" placeholder="Login" class="input-xlarge">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group">
						<!-- Password-->
						<label class="control-label" for="password">Password</label>
						<div class="controls">
							<input type="password" minlength="8" id="password" name="password" placeholder="" class="input-xlarge">
							<p class="help-block"></p>
						</div>
					</div>


					<div class="control-group">
						<!-- Button -->
						<div class="controls">
							<button class="btn btn-success">Login</button>
						</div>
					</div>
				<?php } ?>
			</fieldset>
		</form>                
	</div>
</div>