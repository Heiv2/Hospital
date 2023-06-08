<?php include 'partials/header.php';
if (!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'SignIn.php');
    die();
}
$query="SELECT*FROM doctors";
$result2 = mysqli_query($connection,$query);
$firstn = $_SESSION['appointment-data']['firstname'] ?? null;
$lastn = $_SESSION['appointment-data']['lastname'] ?? null;
$city = $_SESSION['appointment-data']['cityname'] ?? null;
$docn = $_SESSION['appointment-data']['docname'] ?? null;
$date = $_SESSION['appointment-data']['date'] ?? null;
unset($_SESSION['appointment-data']);
?>
<?php if(isset($_SESSION['appointment'])){
        echo "<h4>".$_SESSION['appointment']."</h4>";
        unset($_SESSION['appointment']);
    }
    ?>
<div class="container min-vh-100 justify-content-center d-flex align-items-center">
    
    <form action="appointment-logic.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6 ">
                <label for="inputFirstName">FirstName</label>
                <input type="text" name="firstname" value="<?=$firstn?>" class="form-control" id="inputFirstName" placeholder="FirstName">
            </div>
            <div class="form-group col-md-6 ">
                <label for="inputLastName">LastName</label>
                <input type="text" name="lastname" value="<?=$lastn?>" class="form-control" id="inputFirstName" placeholder="LastName">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCity">City</label>
                <input type="text" name=cityname value="<?=$city?>" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputDoctor">Doctor</label>
                <select id="inputDoctor" name=docname   class="form-control">
                <?php while ($row1 = mysqli_fetch_array($result2)) :; ?>
                        <option value="<?php echo $row1[1];?>"><?php echo $row1[1];?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputDate">Date</label>
                <input type="date" name=date value="<?= $date?>" class="form-control" id="inputDate">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">submit</button>
        </div>
    </form>
</div>
<?php include './partials/footer.php';?>