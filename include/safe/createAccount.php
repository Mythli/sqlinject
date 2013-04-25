<?php
require_once 'lib/password.php';

function createAccount($login, $email, $password, $firstName, $lastName) {
	$login = mysql_real_escape_string($login);
	$email = mysql_real_escape_string($email);
	$password = mysql_real_escape_string($password);
	$firstName = mysql_real_escape_string($firstName);
	$lastName = mysql_real_escape_string($lastName);
	
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
	
	$passwordSalt = base64_encode(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));
	$passwordHash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10, "salt" => $passwordSalt]);
	if(!password_verify($password, $passwordHash)) {
		return FALSE;
	}
		
	if($row['userCount'] < 1) {
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
			or die('Failed to execute query '.$sql.': ' . mysql_error());
		
		return TRUE;
	} else {
		return FALSE;
	}
}

?>
