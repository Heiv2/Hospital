<?php
require '../partials/header.php';
if (!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'SignIn.php');
    die();
}
if (!isset($_SESSION['user_is_admin']) || $_SESSION['user_is_admin'] === false) {
    header('location:' . ROOT_URL);
    die();
}
if (isset($_GET['id'])) {
  $app_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
  $query = "SELECT * FROM appointments WHERE app_id = $app_id";
  $result = mysqli_query($connection, $query);
  $appointment = mysqli_fetch_assoc($result);
  $query="SELECT*FROM doctors";
  $result2 = mysqli_query($connection,$query);
}else{
  header('location:'. ROOT_URL . 'admin/manageappointments.php');
}

?>
<div class="container">
    <h1>Edit Appointment</h1>
    <form action="<?= ROOT_URL ?>admin/editappointments-logic.php" method="POST">
        <input type="hidden" name="app_id" value="<?= $appointment['app_id'] ?>">
        <div class="form-group">
            <label for="inputFirstName">First Name</label>
            <input type="text" name="firstname" class="form-control" id="inputFirstName" value="<?= $appointment['FirstName'] ?>">
        </div>
        <div class="form-group">
            <label for="inputLastName">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="inputLastName" value="<?= $appointment['LastName'] ?>">
        </div>
        <div class="form-group">
            <label for="inputCity">City</label>
            <input type="text" name="cityname" class="form-control" id="inputCity" value="<?= $appointment['city'] ?>">
        </div>
        <div class="form-group">
            <label for="inputDoctor">Doctor</label>
            <select id="inputDoctor" name="docname" class="form-control">
                <?php while ($row1 = mysqli_fetch_array($result2)) :; ?>
                    <option value="<?php echo $row1[1];?>" <?php if($row1[1] == $appointment['docname']) echo "selected";?>><?php echo $row1[1];?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="inputDate">Date</label>
            <input type="date" name="date" class="form-control" id="inputDate" value="<?= $appointment['date'] ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</div>