<?php

function Login($userName, $password) {
	$sql = "
        select
            id,
            login
        from
            user
        where
            login = '" . $userName . "' and
            password = '" . $password . "'
    ";
	$result = mysql_query($sql)
			or die('Failed to execute query: ' . mysql_error());

	return mysql_fetch_array($result);
}

?>
