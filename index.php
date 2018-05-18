<!-- REQUIREING HTML-HEAD AND CHEKING IF USER-SESSION IS ACTIV, IF TRUE USER DIRECTS TO MAIN.PHP-->
<?php
  require_once 'partials/head.php';
  if(isset($_SESSION["loggedIn"])){
    header('Location: main.php');
  }
?>
<!-- LOGIN FORM THAT POST USERNAME AND PASSWORD TO SIGNIN.PHP -->
  <div class="container login-container">
    <h4 class="center">Journal</h4>
      <div class="row">
        <form class="col s6 offset-s3" action="partials/signin.php" method="POST">
          <div class="form-container">
            <div class="row">
              <div class="input-field col s10 offset-s1 ">
                <i class="material-icons prefix">supervisor_account</i>
                <input id="user-name" name="username" type="text" class="validate">
                <label for="user-name">Användarnamn</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s10 offset-s1">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password" name="password" type="password" class="validate">
                <label for="password">Lösenord</label>
              </div>
            </div>
            <div class="row">
              <div class="center">
                <button class="btn waves-effect waves-light orange" type="submit" name="action">Logga in
                </button>
              </div>
            </div>
          </div>
        </form>       
      </div>
    </div>
  </body>
</html>

