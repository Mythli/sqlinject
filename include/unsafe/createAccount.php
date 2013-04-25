<?php

function createAccount($login, $email, $password, $firstName, $lastName) {
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
		or die('Failed to execute query '.$sql.': ' . mysql_error());
	$row = mysql_fetch_assoc($result);
	if($row['userCount'] < 1) {
		$sql = "
			insert into
				user
			(
				login,
				password,
				email,
				firstName,
				lastName
			) VALUES
			(
				'".$login."',
				'".$email."',
				'".$password."',
				'".$firstName."',
				'".$lastName."'
			);
		";
		$result = mysql_query($sql)
			or die('Failed to execute query '.$sql.': ' . mysql_error());
		return TRUE;
	} else {
		return FALSE;
	}
}

?>
