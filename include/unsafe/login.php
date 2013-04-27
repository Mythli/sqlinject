<?php

function Login($login, $password) {
	// Überprüfen ob Nutzer und Passwort in der Datenbank existieren
	$sql = "
        select
            id,
            login
        from
            user
        where
            login = '" . $login . "' and
            password = '" . $password . "'
    ";
	$result = mysql_query($sql)
			or die('Failed to execute query '.$sql.': ' . mysql_error());

	return mysql_fetch_array($result);
}

?>
