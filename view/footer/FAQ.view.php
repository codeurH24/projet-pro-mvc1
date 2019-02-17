<main class="container-fluid <?= $class ?? '' ?>">
  <div class="row justify-content-center ">
    <div class="col-12 col-md-8 col-xl-5 p-2">


      <div id="accordion" >
        <div class="card bg-dark">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0 ">
              <button class="btn btn-link text-white collapsed bg-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Comment nous contacter ?
              </button>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body text-white">
              Un formulaire de contact existe en bas de toutes les pages ou suive ce lien > <a href="/contact/">contact</a>
            </div>
          </div>
        </div>
        <div class="card  bg-dark">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link  text-white collapsed bg-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Comment devenir contributeur ?
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body text-white">
              Vous pouvez faire une demande via le formulaire de <a href="/contact/">contact</a> en precisant dans le titre [Demande de contribution - Votre pseudo]
            </div>
          </div>
        </div>
        <div class="card  bg-dark">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link text-white collapsed bg-dark" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Comment devenir developpeur ou intégrateur web chez PC-CONFIG
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body text-white">
              Vous pouvez nous contacter par le formulaire de <a href="/contact/">contact</a> en precisant dans la description le lien de votre CV, votre Telephone, et votre adresse email utilisé sur PC-CONFIG
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</main>
