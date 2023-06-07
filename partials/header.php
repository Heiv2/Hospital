<?php require './config/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adana City Hospital</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- CUSTOM STYLESHEET -->
  <?php if ($page = "admin") : ?>
    <link rel="stylesheet" href="../css/styleadmin.css">
  <?php endif; ?>
  <link rel="stylesheet" href="./css/style.css">


</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light justify-content-center" style=background-color:#e3f2fd;>
    <a class="navbar-brand" href="<?= ROOT_URL ?>">City Hospital</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <?php if (isset($_SESSION['user-id']) && $_SESSION['user_is_admin'] === true) : ?>
          <li class="nav-item active">
          </li>
          <a class="nav-link" href="<?= ROOT_URL ?>admin/index.php">Dashboard<span class="sr-only">(current)</span></a>
          <li class="nav-item active">
            <a class="nav-link" href="<?= ROOT_URL ?>LogOut.php">LogOut <span class="sr-only">(current)</span></a>
          </li>
        <?php elseif (isset($_SESSION['user-id']) && $_SESSION['user_is_admin'] === false) : ?>
          <a class="nav-link" href="<?= ROOT_URL ?>LogOut.php">LogOut <span class="sr-only">(current)</span></a>
        <?php else : ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?= ROOT_URL ?>SignUp.php">Sign Up <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= ROOT_URL ?>SignIn.php">Sign In <span class="sr-only">(current)</span></a>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </nav>
  <!-- Bootstrap and Jquery -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>