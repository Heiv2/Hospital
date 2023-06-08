<?php include 'partials/header.php';

if (!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'SignIn.php');
    die();
}
?>
<?php if(isset($_SESSION['appointment-success'])){
        echo "<h4>".$_SESSION['appointment-success']."</h4>";
        unset($_SESSION['appointment-success']);
    }
    ?>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
            <img class="card-img-top" src="./images/indir.jpg" alt="image">
                <div class="card-body">
                    <h5 class="card-title">Get your appointment from here</h5>
                    <p class="card-text">City Hospital offers you the best service.</p>
                    <a href="<?= ROOT_URL ?>makeappointment.php" class="btn btn-primary">Click Here</a> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './partials/footer.php';?>