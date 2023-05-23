<?php
include 'partials/header.php';
// get back to data 
$FirstName = $_SESSION['SignUp-data']['FirstName'] ?? null;
$LastName = $_SESSION['SignUp-data']['LastName'] ?? null;
$email = $_SESSION['SignUp-data']['email'] ?? null;
$password = $_SESSION['SignUp-data']['password'] ?? null;
$ConfirmPassword = $_SESSION['SignUp-data']['ConfirmPassword'] ?? null;
$IdentityNumber = $_SESSION['SignUp-data']['IdentityNumber'] ?? null;
$PhoneNumber = $_SESSION['SignUp-data']['PhoneNumber'] ?? null;
unset($_SESSION['SignUp-data']);
?>


<div class="mask d-flex align-items-center h-100 gradient-custom-3">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-8 col-xl-8">
        <div class="card" style="border-radius: 20px;">
          <div class="card-body p-5">
            <h2 class="text-uppercase text-center mb-5">Create an account</h2>
            <?php if (isset($_SESSION['SignUp'])) : ?>
              <div class="alert__message error">
                <p>
                  <?= $_SESSION['SignUp'];
                  unset($_SESSION['SignUp']);
                  ?>
                </p>
              </div>
            <?php endif; ?>

            <form action="signup-logic.php" method="POST">
              <div class="form-outline mb-4">
                <input type="text" id="FirstName" name="FirstName" value="<?= $FirstName ?>" class="form-control form-control-lg" />
                <label class="form-label" for="FirstName">FirstName</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="LastName" name="LastName" value="<?= $LastName ?>" class="form-control form-control-lg" />
                <label class="form-label" for="LastName">LastName</label>
              </div>

              <div class="form-outline mb-4">
                <input type="email" id="email" name="email" value="<?= $email ?>" class="form-control form-control-lg" />
                <label class="form-label" for="email">email</label>
              </div>


              <div class="form-outline mb-4">
                <input type="password" id="password" name="password" value="<?= $password ?>" class="form-control form-control-lg" />
                <label class="form-label" for="password">password</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="ConfirmPassword" name="ConfirmPassword" value="<?= $ConfirmPassword ?>" class="form-control form-control-lg" />
                <label class="form-label" for="ConfirmPassword">Repeat your password</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" id="IdentityNumber" name="IdentityNumber" value="<?= $IdentityNumber ?>" class="form-control form-control-lg" />
                <label class="form-label" for="IdentityNumber">IdentityNumber</label>
              </div>


              <div class="form-outline mb-4">
                <input type="text" id="PhoneNumber" name="PhoneNumber" value="<?= $PhoneNumber ?>" class="form-control form-control-lg" />
                <label class="form-label" for="PhoneNumber">Phone Number</label>
              </div>





              <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
              </div>



            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>