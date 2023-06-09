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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card mx-auto">
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