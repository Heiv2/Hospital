<?php include 'partials/header.php';
if (!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'SignIn.php');
    die();
}
?>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
            <img class="card-img-top" src="./images/indir.jpg" alt="image">
                <div class="card-body">
                    <h5 class="card-title">Get your appointment from here</h5>
                    <p class="card-text">City Hospital offers you the best service.</p>
                    <a href="#" class="btn btn-primary">Click Here</a> 
                </div>
            </div>
        </div>
    </div>
</div>