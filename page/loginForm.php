<div id="myTabContent" class="tab-content">
  <div class="tab-pane active in" id="login">
    <form class="form-horizontal" action='index.php?page=login' method="POST">
      <fieldset>
        <div id="legend">
          <legend class="">Login</legend>
        </div>
        <?php if(IsUserLoggedIn()) { ?>
          <div class="alert alert-success">  
            <a class="close" data-dismiss="alert">×</a>
                <?php
                if($_GET['action'] != 'logout') {
                    echo '<strong>Erfolgreich eingeloggt!</strong> Sie haben sich erfolgreich eingeloggt.';
                }
                ?>
          </div>
        <?php } else { ?>
            <div class="control-group">
              <!-- Username -->
              <label class="control-label"  for="username">Username</label>
              <div class="controls">
                <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
              </div>
            </div>

            <div class="control-group">
              <!-- Password-->
              <label class="control-label" for="password">Password</label>
              <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
              </div>
            </div>


            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <button class="btn btn-success">Login</button>
              </div>
            </div>
        <?php } ?>
      </fieldset>
    </form>                
  </div>
</div>