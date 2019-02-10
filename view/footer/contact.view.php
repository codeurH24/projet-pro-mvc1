<main class="container-fluid <?= $class ?? '' ?>">
  <div class="row justify-content-center ">
    <div class="col-12 col-md-8 col-xl-5 p-2">


      <form action="/contact/submitFormContact/" method="post" id="form-box" class="p-2" >
        <fieldset>
          <legend>Formulaire de Contact</legend>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Entrez votre nom" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Entrez votre adresse email" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="text" name="sujet" class="form-control" placeholder="Entrez un titre" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
            </div>
            <textarea name="msg" id="msg" class="form-control" placeholder="Ecrivez votre message" cols="30" rows="4" required></textarea>
          </div>
          <div class="form-group text-center">
            <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" style="width:300px;height:40px;" />
            <a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">
              <i class="fas fa-sync-alt"></i>
            </a>
          </div>
          <div class="form-group">
            <input type="text" name="captcha_code" size="10" maxlength="6" placeholder="recopiez le code ci-dessus" />
          </div>
          <div class="form-group">
            <input type="submit" name="submitFormContact" id="submit" class="btn btn-primary btn-block" value="Envoyer">
          </div>
        </fieldset>
      </form>


    </div>
  </div>
</main>
