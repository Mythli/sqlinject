<?php
if (IsUserLoggedIn()) {
	$sql = "
        select
            bankingdetails.id,
            bankingdetails.accountNumber,
            bankingdetails.validYear,
            bankingdetails.blz,
            bankingdetails.bankName,
            user.email,
            user.firstName,
            user.lastName
        from
            bankingdetails,
            user
        where
            user.id = bankingdetails.userId
    ";

	if (!IsUserAdmin()) {
		$sql.="
            and user = " . $_SESSION['loginData']['id'] . ";
        ";
	}

	$result = mysql_query($sql)
			or die('Failed to execute query '.$sql.': ' . mysql_error());
}
?>

<div id="myTabContent" class="tab-content">
	<div class="tab-pane active in" id="login">
		<form class="form-horizontal" action='' method="POST">
			<fieldset>
				<div id="legend">
					<legend class="">Kreditdaten</legend>
					<?php if (IsUserLoggedIn()) { ?>
						<table class="table table-striped">
							<th>
								<td>Id</td>
								<td>E-Mail</td>
								<td>Besitzer</td>
								<td>Kontonummer</td>
								<td>Gültigkeit</td>
								<td>Bank</td>
								<td>Bankleitzahl</td>
							</th>
							<?php
							while ($row = mysql_fetch_assoc($result)) {
								echo '<tr>';
								echo '    <td></td>';
								echo '    <td>' . $row['id'] . '</td>';
								echo '    <td>' . $row['email'] . '</td>';
								echo '    <td>' . $row['firstName'] . ' ' . $row['lastName'] . '</td>';
								echo '    <td>' . $row['accountNumber'] . '</td>';
								echo '    <td>' . $row['validYear'] . '</td>';
								echo '    <td>' . $row['bankName'] . '</td>';
								echo '    <td>' . $row['blz'] . '</td>';
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