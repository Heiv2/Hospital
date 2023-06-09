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
<script type="text/javascript" src="../js/client.js"></script>

<div class="container-fluid h-100">
    <div class="row h-100">
      <!-- Sidebar -->
      <div class="col-3 col-md-2 px-0 sidebar">
        <nav class="navbar navbar-expand-md navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="sidebarMenu">
            <div class="list-group list-group-flush">
              <a href="<?= ROOT_URL?>admin/manageappointments.php" id="manageapp" class="list-group-item list-group-item-action">Manage Appointments</a>
              <a href="<?= ROOT_URL?>admin/deletedappointments.php"id="deletedapps" class="list-group-item list-group-item-action">Deleted Appointment Log</a>
              <a href="<?= ROOT_URL?>admin/patientsfromcities.php" id="grouping"class="list-group-item list-group-item-action">Patients Grouped by Every City</a>
            </div>
          </div>
        </nav>
      </div>
      <!-- Content -->
      <div class="col content-window">
        <div class="container pt-3">
          <h1 class="hello">Hello, Kaan!</h1>
          <p class="panel">This is your admin panel</p>
          <?php if(isset($_SESSION['update-success'])){
        echo '<p class="edit-success">'.$_SESSION['update-success']."</p>";
        unset($_SESSION['update-success']);
    }
    ?>
    <?php if(isset($_SESSION['delete-user-success'])){
        echo '<p class="edit-success">'.$_SESSION['delete-user-success']."</p>";
        unset($_SESSION['delete-user-success']);
    }
    ?>
        </div>
      </div>
    </div>
  </div>
  <?php include '../partials/footer.php';?>
</body>
</html>
