<main class="container-fluid h-100 admin"  style="display:flex;flex:1;flex-direction: column;justify-content: flex-start;align-items: stretch;align-content: stretch;display: flex;flex-direction: row;justify-content: flex-start;align-items: stretch;align-content: stretch;">
  <div class="row justify-content-center" style="flex:1;flex-direction: column;justify-content: flex-start;align-items: stretch;align-content: stretch;display: flex;flex-direction: row;justify-content: flex-start;align-items: stretch;align-content: stretch;">
    <div class="col-1 col-md-4 col-lg-3 col-xl-2 menu-left">
      <?php require 'view/admin/menuLeftAdmin.php' ?>
    </div>
    <div class="col-11 col-md-8 col-lg-9 col-xl-10 content-admin">
      <?php if (isset($_SESSION['user'])): ?>
        <div class="identity">
          <div class="endOfidentity"></div>
          <p>Compte de <?= $_SESSION['user']['pseudo'] ?></p>
        </div>
      <?php endif; ?>
      <h1></i>Administration</h1>
      <div class="container-fluid">
        <div class="row justify-content-center">
