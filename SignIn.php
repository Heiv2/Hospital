<?php
include 'partials/header.php';
$email = $_SESSION['signin-data']['email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;
unset($_SESSION['signin-data']);
?>

<?php if (isset($_SESSION['signup-success'])) : ?>
  <div class="alert_message success">
    <p>
      <?= $_SESSION['signup-success'];
      unset($_SESSION['signup-success']) ?>
    </p>
  </div>
<?php elseif (isset($_SESSION['SignIn'])) : ?>
  <div class="aler_message_error">
    <p>
      <?= $_SESSION['SignIn'];
      unset($_SESSION['SignIn']) ?>
    </p>
  </div>
<?php endif ?>
<div class="container min-vh-100 justify-content-center d-flex align-items-center">
  <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">

    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" value="<?= $email ?>" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="password" value="<?= $password ?>" placeholder="password">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" name='check' class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check this !</label>
    </div>
    <button type="submit" name="submit" value="confirm" class="btn btn-primary">Submit</button>

  </form>
</div>