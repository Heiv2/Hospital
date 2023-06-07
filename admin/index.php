<?php $page = 'admin';
include '../partials/header.php';
if (!isset($_SESSION['user-id'])) {
  header('location:' . ROOT_URL . 'SignIn.php');
  die();
}
if (!isset($_SESSION['user_is_admin']) || $_SESSION['user_is_admin'] === false) {
  header('location:' . ROOT_URL);
  die();
}
?>

<link rel="stylesheet" href="">
<div class="container-fluid h-100">
    <div class="row h-100">
      <!-- Sidebar -->
      <div class="col-3 col-md-2 px-0 sidebar">
        <h4 class="text-center my-3 header-border">Admin Panel</h4>
        <div class="list-group list-group-flush">
          <a href="<?= ROOT_URL?>admin/manageappointments.php" class="list-group-item list-group-item-action">Manage Appointments</a>
          <a href="<?= ROOT_URL?>admin/deletedappointments.php" class="list-group-item list-group-item-action">Manage Appointments</a>
          <a href="<?= ROOT_URL?>admin/patientsfromcities.php" class="list-group-item list-group-item-action">Manage Appointments</a>
        </div>
      </div>
      <!-- Content -->
      <div class="col">
        <div class="container pt-3">
          <h1>Hoşgeldiniz</h1>
          <p>Bu bir admin paneli örneğidir.</p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>