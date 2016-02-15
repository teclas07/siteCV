<main>
  <div class="row">
    <div class="col s3 offset-s4">
      <div class="card">
        <div class="card-content">
          <div class="row">
            <form id="form" class="col s12" action="action.php?focus=signup" method="POST" novalidate="novalidate">
              <h4 style="color:#4db6ac">Inscrivez-vous</h4>
              <div class="row">
                <div class="input-field col s12">
                  <input id="login" name="login" type="text" class="validate" required="" aria-required="true">
                  <label for="login" data-error="wrong">Login</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="email" name="email" type="email" class="validate" required="" aria-required="true">
                  <label for="email">Email</label>
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
                  <input id="confirmPassword" name="confirmPassword" type="password" class="validate" required="" aria-required="true">
                  <label for="confirmPassword">Password</label>
                  <p style="color:#4db6ac">Déjà un compte ?<a href="signin.php"> connectez-vous.</a></p>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input type="hidden" name="toto" value="123"/>
                  <button type="submit" class="waves-effect waves-light btn" name="submit" value="submit"><i class="material-icons right">done</i>Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
