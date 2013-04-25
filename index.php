<!DOCTYPE html>
<?php
// set up some requirements
session_start();
require_once 'include/handyShit.php';

// handle logout requests
if($_GET['action']=='logout') { 
    session_unset();
}

// set safety mode
if(!isset($_SESSION['safe'])) {
	$_SESSION['safe'] = FALSE;
}
if(isset($_GET['mode'])) {
	if($_GET['mode'] == 'safe') {
		$_SESSION['safe'] = TRUE;
	} else if($_GET['mode'] == 'unsafe') {
		$_SESSION['safe'] = FALSE;
	}
}

require_once 'include/'.  SafePath().'/login.php';

// store login data in session variable
if($_GET['action'] == 'login') {
    $_SESSION['loginData'] = Login($_POST['login'], $_POST['password']);
}
?>

<!-- html boilerplate and shit -->
<html>
  <head>
    <title>SqlInject</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="">
      <div class="well">
        <ul class="nav nav-tabs">
            <?php
            if(IsUserLoggedIn()) {
                echo '<li class="'.GetTabStatusStr('login').'"><a href="?page=login&action=logout">Logout</a></li>';
                echo '<li class="'.GetTabStatusStr('creditData').'"><a href="?page=creditData">Kreditdaten</a></li>';
                if(IsUserAdmin()) {
                    echo '<li class="'.GetTabStatusStr('userData').'"><a href="?page=userData">Benutzer</a></li>';
                }
            } else {
                echo '<li class="'.GetTabStatusStr('userData').'"><a href="?page=login">Login</a></li>';
				echo '<li class="'.GetTabStatusStr('createAccountForm').'"><a href="?page=createAccountForm">Account erstellen</a></li>';
            }
            ?>
        </ul>
        <?php
            switch($_GET['page']) {
                case 'login':
                    include 'page/loginForm.php';
                    break;
				case 'createAccountForm':
                    include 'page/createAccountForm.php';
                    break;
                case 'userData':
                    include 'page/userData.php';
                    break;
                case 'creditData':
                    include 'page/creditData.php';
                    break;
                default:
                    include 'page/loginForm.php';
                    break;
            }
        ?>
      </div>
    </div>
  </body>
</html>