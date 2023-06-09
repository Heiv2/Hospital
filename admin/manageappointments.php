<?php 
  $page='admin';
  require '../partials/header.php';
  if (!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'SignIn.php');
    die();
  }
  if (!isset($_SESSION['user_is_admin']) || $_SESSION['user_is_admin'] === false) {
    header('location:' . ROOT_URL);
    die();
  }
  $current_admin_id = $_SESSION['user-id'];
  $query = "SELECT id,app_id, appointments.FirstName, appointments.LastName,
  city,date,docname
  FROM appointments INNER JOIN users ON appointments.user_id = users.id WHERE NOT users.id=$current_admin_id";
  
  $apps = mysqli_query($connection,$query);
?>

<main class="container">
  <h2>Appointments Log</h2>
  <div class="table-responsive"> <!-- table-responsive class added here -->
    <table class="table">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Appointment ID</th>
          <th>FirstName </th>
          <th>LastName</th>
          <th>City</th>
          <th>date</th>
          <th>docname</th>
          <th></th>
          <th></th>
        </tr> 
      </thead>
      <tbody>
        <?php while($ap = mysqli_fetch_assoc($apps)): ?>
          <tr>
            <td><?= "{$ap['id']}"?></td>
            <td><?= "{$ap['app_id']}"?></td>
            <td><?= "{$ap['FirstName']}"?></td>
            <td><?= "{$ap['LastName']}"?></td>
            <td><?= "{$ap['city']}"?></td>
            <td><?= "{$ap['date']}"?></td>
            <td><?= "{$ap['docname']}"?></td>
            <td><a href="<?= ROOT_URL?>admin/editappointments.php?id=<?=$ap['app_id']?>"
            class="btn btn-warning">Edit</a></td>
            <td><a href="<?= ROOT_URL?>admin/deleteappointments.php?id=<?=$ap['app_id']?>"
            class="btn btn-danger">Delete</a></td>
          </tr>
        <?php endwhile ?>
      </tbody>
    </table>
  </div>
</main>
<?php include '../partials/footer.php';?>