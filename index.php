<!DOCTYPE html>
<?php
// set up some requirements
session_start();
require_once 'include/handyShit.php';

// handle logout requests
if($_GET['action']=='logout') { 
    session_unset();
}

if($_GET['loginType'] == 'safe') {
    // use safe login
    require_once 'include/login.php';
} else {
    // use unsafe login (default)
    require_once 'include/loginUnsafe.php';
}

// store login data in session variable
if(isset($_POST['username']) && isset($_POST['password'])) {
    $_SESSION['loginData'] = Login($_POST['username'], $_POST['password']);
}
?>

<!-- html boilerplate and shit -->
<html>
  <head>
    <title>SqlInject</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="modal-body">
      <div class="well">
        <ul class="nav nav-tabs">
            <?php
            if(IsUserLoggedIn()) {
                echo '<li class="'.GetTabStatusStr('login').'"><a href="?page=login&action=logout">Logout</a></li>';
                echo '<li class="'.GetTabStatusStr('creditData').'"><a href="?page=creditData">Kreditdaten</a></li>';
                echo '<li class="'.GetTabStatusStr('userData').'"><a href="?page=userData">Benutzer</a></li>';
            } else {
                echo '<li class="active"><a href="?page=login">Login</a></li>';
            }
            ?>
        </ul>
        <?php
            switch($_GET['page']) {
                case 'login':
                    include 'page/loginForm.php';
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