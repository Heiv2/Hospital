<?php
$page = 'admin';
require '../partials/header.php';
if (!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'SignIn.php');
    die();
}
if (!isset($_SESSION['user_is_admin']) || $_SESSION['user_is_admin'] === false) {
    header('location:' . ROOT_URL);
    die();
}

// deleted appointments
$query = "SELECT * FROM appointment_log";
$result = mysqli_query($connection, $query);

?>
<div class="container">
    <h2>Deleted Appointments</h2>
    <table>
        <!-- table headers -->
        <tr>
            <th>Appointment ID</th>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>City</th>
            <th>Date</th>
            <th>Doctor</th>
            <th>Deleted At</th>
        </tr>
        <!-- table data -->
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['app_id'] ?></td>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['FirstName'] ?></td>
                <td><?= $row['LastName'] ?></td>
                <td><?= $row['City'] ?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['docname'] ?></td>
                <td><?= $row['deleted_at'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
<?php include '../partials/footer.php';?>