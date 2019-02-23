<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Roboto" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Source+Sans+Pro" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/lux/bootstrap.min.css" rel="stylesheet" integrity="sha384-ML9h/UCooefre72ZPxxOHyjbrLT1xKV0AHON1J+OlOV2iwcYemqmWyMfTcfyzLJ1" crossorigin="anonymous">
  <link rel="stylesheet" href="/public/css/form.css" />
  <link rel="stylesheet" href="/public/css/master.css" />
  <link rel="stylesheet" href="/public/css/componentItemPage.css" />
  <link rel="stylesheet" href="/public/css/debug.css" />
  <link rel="stylesheet" href="/public/css/legalNotice.css" />


  <title><?= $title ?? 'PC CONFIG' ?></title>
</head>
<body>
  <header>
    <div class="banner">
      <p>Configurer votre PC comme un Pro</p>
    </div>
  </header>
  <nav class="navbar navbar-dark bg-nav-master sticky-top">
    <a class="navbar-brand home" href="/"><i class="fas fa-2x fa-screwdriver mr-1"></i> PC CONFIG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">
            <i class="fas fa-2x fa-home"></i>
            Accueil <span class="sr-only">(current)</span>
          </a>
        </li>
        <?php if (!isset($_SESSION['user'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="/mon-compte/connexion/">
              <i class="fas fa-2x fa-wifi"></i>
              Se connecter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/mon-compte/inscription/">
              <i class="far fa-2x fa-address-book" id="registrationLink"></i>
              S'inscrire
            </a>
          </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['user'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-2x fa-user-alt"></i> Mon compte
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if (accessElement('/mes-creations/')): ?>
              <a class="dropdown-item" href="/mes-creations/">Tableau de bord</a>
              <?php endif; ?>
              <?php if (accessElement('/admin/')): ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/admin/">Administration</a>
              <?php endif; ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/mon-compte/logout/">Se Déconnecter</a>
            </div>
          </li>
        <?php endif; ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-2x fa-keyboard"></i> Composants
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/composants/carte-mere-1.php">Cartes mères</a>
            <a class="dropdown-item" href="/composants/processeur-1.php">Processeurs</a>
            <a class="dropdown-item" href="/composants/memoire-vive-1.php">Mémoires vives</a>
            <a class="dropdown-item" href="/composants/carte-graphique-1.php">Cartes Graphiques</a>
          </div>
        </li>
        <?php if( isset($_SESSION['user']) && function_exists('whoIsEnableInMyCreation') && ($idCreation = whoIsEnableInMyCreation()) != false ) { ?>
        <li class="nav-item">
          <a class="nav-link" href="/mes-creations/detail/<?= $idCreation ?>.php"><i class="fas fa-2x fa-puzzle-piece"></i>Ma création</a>
        </li>
        <?php }  ?>
      </ul>

      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" name="searchInput" placeholder="Rechercher">
        <button type="button" name="button">
          <img src="/public/picture/search.png" alt="search" />
        </button>
      </form>
    </div>
  </nav>
  <?= $content ?>
  <footer class="page-footer bg-primary text-white font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">
        <div class="col">
          <ul class="list-unstyled">
            <li>
              <a href="/contact/">
                <i class="fas fa-envelope"></i> Nous contacter
              </a>
            </li>
            <li>
              <a href="/FAQ/">
                <i class="fas fa-question-circle"></i> FAQ
              </a>
            </li>
            <li>
              <a href="/mentions-legales.php">
                <i class="fas fa-gavel"></i> Mention Légales
              </a>
            </li>
            <li>
              <a href="/plan/">
                <i class="far fa-map"></i> Plan du site
              </a>
            </li>
          </ul>
        </div>
        <div class="col">
          <ul class="list-unstyled">
            <li>
              <a href="/">
                <i class="fas fa-home"></i>
                Accueil <span class="sr-only">(current)</span>
              </a>
            </li>
            <li>
              <a href="/mon-compte/inscription/">
                <i class="far fa-address-book" id="registrationLink"></i>
                S'inscrire
              </a>
            </li>
            <li>
              <a href="/mon-compte/connexion/">
                <i class="fas fa-wifi"></i>
                Se connecter
              </a>
            </li>
          </ul>
        </div>
        <div class="col">
          <ul class="list-unstyled">
            <li>
              <a href="/composants/carte-mere-1.php">
                Carte Mère
              </a>
            </li>
            <li>
              <a href="/composants/carte-graphique-1.php">
                Carte Graphique
              </a>
            </li>
            <li>
              <a href="/composants/memoire-vive-1.php">
                Mémoire Vive
              </a>
            </li>
            <li>
              <a href="/composants/processeur-1.php">
                Processeur
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
      © 2019 Copyright:
      <a href="https://mdbootstrap.com/bootstrap-tutorial/"> PC-CONFIG.FR</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

  <?php if (isset($debug)): ?>
  <div id="debug">
    <div class="positions text-right">
      <p class="title">Console de diagnostic</p>
      <button class="btn btn-sm btn-danger" onclick="debug.children[2].style.display='none';debug.children[1].style.display='none';"><i class="fas fa-window-minimize"></i></button>
      <button class="btn btn-sm btn-danger" onclick="debug.children[2].style.display='block';debug.children[1].style.display='block';"><i class="fas fa-expand"></i></button>
      <button class="btn btn-sm btn-danger" onclick="debug.style.top=0;debug.style.bottom='auto';"><i class="fas fa-arrow-up"></i></button>
      <button class="btn btn-sm btn-danger" onclick="debug.style.top='auto';debug.style.bottom=0;"><i class="fas fa-arrow-down"></i></button>
    </div>
    <ul class="nav nav-pills" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#debug-array" role="tab" aria-controls="pills-home" aria-selected="true">print_r()</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#debug-dump" role="tab" aria-controls="pills-profile" aria-selected="false">var_dump()</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#debug-count" role="tab" aria-controls="pills-profile" aria-selected="false">count()</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="debug-array" role="tabpanel" aria-labelledby="pills-home-tab">
        <pre><?= print_r($debug) ?></pre>
      </div>
      <div class="tab-pane fade" id="debug-dump" role="tabpanel" aria-labelledby="pills-profile-tab">
        <pre><?= var_dump($debug) ?></pre>
      </div>
      <div class="tab-pane fade" id="debug-count" role="tabpanel" aria-labelledby="pills-profile-tab">
        <?php if (is_array($debug) || $debug instanceof Countable){ ?>
          <pre><?= count($debug) ?></pre>
        <?php }else{ ?>
          <p>Not countable</p>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php endif; ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="/public/js/jquery-3.3.1.min.js"></script>
  <script src="/public/js/popper.min.js"></script>
  <script src="/public/js/bootstrap.min.js"></script>
  <script src="/public/js/notify.min.js"></script>
  <?php
  if (isset($_SESSION['notification'])){
  ?>
    <script>
      window.notifier= '<?= addslashes($_SESSION['notification']) ?>';
    </script>
    <script src="/public/js/notification.js"></script>
    <?php $_SESSION['notification'] = []; unset($_SESSION['notification']);
  }
  ?>
  <script>
  $('#myModal').modal('show');
  $('select[name=idRole]').change(function(){
    var userID = $(this).attr('data-user-id');
    $.ajax({
      type: 'POST',
      url: '/admin/utilisateurs/ajaxupdaterole/',
      data: {
        idRole: this.value,
        idUser: userID
      }
    })
    .done(function(data) {
      alert('Le role a été modifier avec succès');
    })
    .fail(function() {
      alert('Une erreur c\'est produite');
    });
  });
  </script>
</body>
</html>
