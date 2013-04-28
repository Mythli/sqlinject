<?php

// establish database connection
mysql_connect('mythli.net', 'sqlinject', '2013sqlinject') or die('Database connection failed: '.mysql_error());
mysql_select_db('sqlinject');
mysql_query("SET NAMES utf8");

function GetTabStatusStr($page) {
	if($page=='login' && !isset($_GET['page'])) {
		return 'active';
	}
    return $_GET['page'] == $page ? 'active' : '';
}

function IsUserLoggedIn() {
    return $_SESSION['loginData'] == TRUE;
}

function IsUserAdmin() {
    if(IsUserLoggedIn()) {
        if($_SESSION['loginData']['login'] == 'admin') {
            return TRUE;
        }
    }
    return FALSE;
}

function IsSafe() {
	return $_SESSION['safe'];
}

function SafePath() {
	return IsSafe() ? 'safe' : 'unsafe';
}

?>
