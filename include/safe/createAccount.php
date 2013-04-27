<?php
require_once 'lib/password.php';

function createAccount($login, $email, $password, $firstName, $lastName) {
	// Form-Daten escapen
	$login = mysql_real_escape_string($login);
	$email = mysql_real_escape_string($email);
	$password = mysql_real_escape_string($password);
	$firstName = mysql_real_escape_string($firstName);
	$lastName = mysql_real_escape_string($lastName);
	
	// Überprüfen ob Nutzer schon existiert
	$sql = "
		select 
			count(*) as userCount
		from
			user
		where
			login = '".$login."' or
			email = '".$email."';
	";
	$result = mysql_query($sql)
		// eigentliche Fehlermeldung loggen
		or die('Ein unbekannter Fehler ist aufgetreten. Das tut uns leid.');
	$row = mysql_fetch_assoc($result);
	if(!password_verify($password, $passwordHash)) {
		return FALSE;
	}
		
	if($row['userCount'] < 1) {
		// Salt generieren
		$passwordSalt = base64_encode(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
		// Passwort-Hash mit einer slow-hash Funktion generieren 
		$passwordHash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10, "salt" => $passwordSalt]);	
		
		// Account erstellen
		$sql = "
			insert into
				user
			(
				login,
				email,
				passwordHash,
				passwordSalt,
				firstName,
				lastName
			) VALUES
			(
				'".$login."',
				'".$email."',
				'".$passwordHash."',
				'".$passwordSalt."',
				'".$firstName."',
				'".$lastName."'
			);
		";
		$result = mysql_query($sql)
			// eigentliche Fehlermeldung loggen
			or die('Ein unbekannter Fehler ist aufgetreten. Das tut uns leid.');
		
		return TRUE;
	} else {
		return FALSE;
	}
}

?>
