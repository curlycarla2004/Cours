<?php require_once('functions.php'); ?>

<?php if (is_admin()) : ?>
  <div style="position: fixed;right: 0; top: 200px;">
    <div class="alert alert-success px-4 shadow" role="alert">
      <h5 class="text-center"><?php echo date('D. j M.'); ?></h5>
      <p class="text-center">
        Hello <strong>admin</strong>!
      </p>
      <div class="d-flex justify-content-center">
        <a class="btn btn-outline-danger btn-sm" href="logout.php"> <i class="fa fa-power-off" aria-hidden="true"></i> </a>
      </div>
    </div>
  </div>
<?php else : ?>
  <div style="position: fixed;right: 0; top: 200px;">
    <div class="alert alert-info px-4 shadow" role="alert">
      <a class="btn btn-outline-primary btn-sm" href="login.php"><i class="fa fa-user pr-2" aria-hidden="true"></i>Connexion</a>
    </div>
  </div>
<?php endif; ?>
