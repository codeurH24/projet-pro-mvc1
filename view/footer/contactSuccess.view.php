<main class="container-fluid <?= $class ?? '' ?>">
  <div class="row justify-content-center ">
    <div class="col-12 col-md-8 col-xl-5 p-2">
      <form method="post" action="/">
        <fieldset>
          <legend>Contact</legend>
          <div class="form-group text-success">
            <label for="nom">Votre message à bien été pris en compte.</label>
          </div>
          <div class="text-right">
            <button type="submit" name="deleteUser" class="btn btn-primary ">Ok</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</main>
