<?php

// establish database connection
mysql_connect('mythli.net', 'sqlinject', '2013sqlinject') or die('Database connection failed: '.mysql_error());
mysql_select_db('sqlinject');

function GetTabStatusStr($page) {
    return $_GET['page'] == $page ? 'active' : '';
}

function IsUserLoggedIn() {
    return $_SESSION['loginData'] == TRUE;
}

?>
