<?php
require_once 'lib/password.php';

function GetSaltFromUser($login) {
	$sql = "
		select
			passwordSalt
        from
            user
        where
            login = '" . $login . "' and
			passwordSalt is not null
		limit 0,1
	";
	
	$result = mysql_query($sql)
			or die('Ein unbekannter Fehler ist aufgetreten. Das tut uns leid.');
	$saltArr = mysql_fetch_assoc($result);
	return $saltArr['passwordSalt'];
}

function Login($login, $password) {
	$login = mysql_real_escape_string($login);
	$password = mysql_real_escape_string($password);
	
	// Salt des Nutzers auslesen
	$passwordSalt = GetSaltFromUser($login);
	// Passwort-Hash mit einer slow-hash Funktion generieren 
	$passwordHash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10, "salt" => $passwordSalt]);
	
	// Überprüfen ob Benutzername und Passwort-Hash in der Datenbank existieren
	$sql = "
        select
            id,
            login
        from
            user
        where
            login = '" . $login . "' and
            passwordHash = '" . $passwordHash . "'
		limit 0,1
    ";
	$result = mysql_query($sql)
			or die('Ein unbekannter Fehler ist aufgetreten. Das tut uns leid.');

	return mysql_fetch_assoc($result);
}

?>
