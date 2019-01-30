<ul class="nav flex-column">
  <?php if (accessElement('/admin/categorie/')): ?>
  <li class="nav-item">
    <div class="btn-group dropright w-100">
      <a class="btn btn-primary  w-100" href="/admin/categorie/" style="color:white">
        <i class="fas fa-2x fa-stream"></i><span>Categories</span>
      </a>
    </div>
  </li>
  <?php endif; ?>
  <?php if (accessElement('/admin/composant/')): ?>
  <li class="nav-item">
    <div class="btn-group dropright w-100">
      <a class="btn btn-primary  w-100" href="/admin/composant/" style="color:white">
        <img src="/public/image/gpu.png" alt="carte graphique" width="40" /><span>Composants</span>
      </a>
    </div>
  </li>
  <?php endif; ?>
  <?php if (accessElement('/admin/revendeur/')): ?>
  <li class="nav-item">
    <div class="btn-group dropright w-100">
      <a class="btn btn-primary  w-100" href="/admin/revendeur/" style="color:white">
        <i class="fas fa-2x fa-hand-holding-usd"></i><span>Revendeurs</span>
      </a>
    </div>
  </li>
  <?php endif; ?>
  <?php if (accessElement('/admin/utilisateurs/')): ?>
    <li class="nav-item">
      <div class="btn-group dropright w-100">
        <a class="btn btn-primary  w-100" href="/admin/utilisateurs/" style="color:white">
          <i class="fas fa-2x fa-user-alt icon-white"></i><span>Utilisateurs</span>
        </a>
      </div>
    </li>
  <?php endif; ?>
  <?php if (accessElement('/admin/roles/')): ?>
  <li class="nav-item">
    <div class="btn-group dropright w-100">
      <a class="btn btn-primary  w-100" href="/admin/roles/" style="color:white">
        <i class="fas fa-2x fa-users"></i><span>Roles</span>
      </a>
    </div>
  </li>
  <?php endif; ?>
  <?php if (accessElement('/admin/log/1')): ?>
  <li class="nav-item">
    <div class="btn-group dropright w-100">
      <a class="btn btn-primary  w-100" href="/admin/log/1" style="color:white">
        <i class="fas fa-2x fa-exclamation-circle"></i><span>Logs</span>
      </a>
    </div>
  </li>
  <?php endif; ?>
  <?php if (accessElement('/admin/acces/')): ?>
  <li class="nav-item">
    <div class="btn-group dropright w-100">
      <a class="btn btn-primary  w-100" href="/admin/acces/" style="color:white">
        <i class="fas fa-2x fa-unlock-alt"></i><span>Accès</span>
      </a>
    </div>
  </li>
  <?php endif; ?>
</ul>
