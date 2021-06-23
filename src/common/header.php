<nav class="navbar navbar-expand-lg navbar-light navColor">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../../index.php"><img src="../../../src/img/E.gif" alt="logo" class="w-25 ms-5"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mr-auto justify-content-end fw-bold" id="navbarText">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php if (isset($_SESSION["connected"])) { ?>
            <p class="me-2 mt-2">Bonjour <?php echo $_SESSION["login"] ?></p>
          <?php } else { ?>
            <a class="nav-link" aria-current="page" href="../../src/pages/login.php"><i class="fas fa-sign-in-alt me-2"></i>Se connecter</a>
          <?php } ?>
        </li>
        <li class="nav-item">
        <?php if (isset($_SESSION["connected"])) { ?>
          <a class="nav-link" href="../../../src/pages/admin.php"><i class="fas fa-shield-alt me-2"></i></i>admin</a>
          <?php } ?>
        </li>
        <li class="nav-item">
        <?php if (isset($_SESSION["connected"])) { ?>
          <a class="nav-link" href="../../src/pages/disconnect.php"><i class="fas fa-sign-out-alt me-2"></i>Déconnection</a>
          <?php } else { ?>
            <a class="nav-link" href="../../src/pages/register.php"><i class="fas fa-bullseye me-2"></i>s'enregistrer</a>
          <?php } ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-shopping-basket me-2"></i>panier</a>
        </li>
      </ul>
    </div>
  </div>
</nav>