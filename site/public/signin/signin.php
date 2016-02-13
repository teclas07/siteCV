<main>
  <div class="row">
    <div class="col s3 offset-s4">
      <div class="card">
        <div class="card-content">
          <div class="row">
            <form class="col s12" action="signin.php" method="post">
              <h4 style="color:#4db6ac">Connectez-vous</h4>
              <div class="row">
                <div class="input-field col s12">
                  <input id="login" name="login" type="text" class="validate" required="" aria-required="true">
                  <label for="login">Login</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" name="password" type="password" class="validate" required="" aria-required="true">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <button type="submit" class="waves-effect waves-light btn" name="signin"><i class="material-icons right">done</i>Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
