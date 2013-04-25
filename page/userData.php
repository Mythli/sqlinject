<?php
if (IsUserLoggedIn()) {
	$sql = "
        select
			id,
			login,
			password,
			passwordHash,
			passwordSalt,
			email,
            firstName,
            lastName
        from
            user;
    ";
	$result = mysql_query($sql)
			or die('Failed to execute query '.$sql.': ' . mysql_error());
}
?>

<div id="myTabContent" class="tab-content">
	<div class="tab-pane active in" id="userData">
		<form class="form-horizontal" action='' method="POST">
			<fieldset>
				<div id="legend">
					<legend class="">Benutzerdaten</legend>
					<?php if (IsUserAdmin()) { ?>
						<table class="table table-striped">
							<th>
								<td>Id</td>
								<td>Login</td>
								<td>E-Mail</td>
								<td>Name</td>
								<td>Passwort</td>
								<td>Passwort-Hash</td>
								<td>Passwort-Salt</td>
							</th>
							<?php
							while ($row = mysql_fetch_assoc($result)) {
								echo '<tr>';
								echo '    <td></td>';
								echo '    <td>' . $row['id'] . '</td>';
								echo '    <td>' . $row['email'] . '</td>';
								echo '    <td>' . $row['login'] . '</td>';
								echo '    <td>' . $row['firstName'] . ' ' . $row['lastName'] . '</td>';
								echo '    <td>' . $row['password'] . '</td>';
								echo '    <td>' . $row['passwordHash'] . '</td>';
								echo '    <td>' . $row['passwordSalt'] . '</td>';
								echo '</tr>';
							}
							?>
						</table>
					<?php
					} else {
						echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>Keine Berichtigung!</strong> Zugriff auf diese Seite is ihnen leider nicht gestattet.</div>';
					}
					?>
				</div>
			</fieldset>
		</form>                
	</div>
</div>