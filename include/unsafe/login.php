<?php

function Login($login, $password) {
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
			or die('Failed to execute query: ' . mysql_error());

	return mysql_fetch_array($result);
}

?>
