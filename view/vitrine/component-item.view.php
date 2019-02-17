<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="row justify-content-center">
        <div class="col-12 col-xl-8 conponent-item2-page">
          <div class="row">
            <div class="col-12 col-sm-4 text-center text-sm-left image-item">
              <img class="" src="/public/image/composants/<?= $value->image ?>" alt="Image Composant">
            </div>
            <div class="col-12 col-sm-8 infos-item">
              <div class="row">
                <h2><?= $value->model ?></h2>
              </div>
              <div class="row">
                <div class="col-10 col-sm-8">
                  <div>
                    <div class="label">Bureautique</div>
                    <div class="pastie pastie5">5</div>
                  </div>
                  <div>
                    <div class="label">Multimedia</div>
                    <div class="pastie pastie5">5</div>
                  </div>
                  <div>
                    <div class="label">Jeux video</div>
                    <div class="pastie pastie5">5</div>
                  </div>
                  <div>
                    <div class="label">Rendu 3D</div>
                    <div class="pastie pastie5">5</div>
                  </div>
                </div>
                <div class="col-2 col-sm-4 tools">
                  <?php if (isset($_SESSION['user'])): ?>
                    <form method="post" action="/composants/ajout-a-la-creation/">
                      <input type="hidden" name="id" value="<?= $value->id_composant ?>" />
                      <button type="submit" name="button" title="Ajouter à la config">
                        <i class="fas fa-arrow-circle-up"></i>
                      </button>
                    </form>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
