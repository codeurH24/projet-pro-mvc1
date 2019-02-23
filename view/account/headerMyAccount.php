<main class="container-fluid h-100"  style="display:flex;flex:1;flex-direction: column;justify-content: flex-start;align-items: stretch;align-content: stretch;display: flex;flex-direction: row;justify-content: flex-start;align-items: stretch;align-content: stretch;">
  <div class="row justify-content-center" style="flex:1;flex-direction: column;justify-content: flex-start;align-items: stretch;align-content: stretch;display: flex;flex-direction: row;justify-content: flex-start;align-items: stretch;align-content: stretch;">
    <div class="col-1 col-md-4 col-lg-3 col-xl-3 menu-left">
      <?php require 'view/account/accountMenuLeft.php'; ?>
    </div>
    <div class="col-11 col-md-8 col-lg-9 col-xl-9 content-creation">
      <?php if (isset($_SESSION['user'])): ?>
      <div class="identity">
        <div class="endOfidentity"></div>
        <p>Compte de <?= $_SESSION['user']['pseudo'] ?></p>
      </div>
      <?php endif; ?>
      <div class="container-fluid">
      <div class="row justify-content-md-center">
        <div class="col-12 col-sm-12 col-md-11 col-xl-8 creations" >
