<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if (!isset($_SESSION['adminname'])) {
  echo "<script> window.location.href='" . ADMINURL . "/admins/login-admins.php'; </script>";
}


if (isset($_POST['submit'])) {

  if (
    (empty($_POST['name'])) or empty($_POST['icon']) or empty($_POST['adminname'])
  ) {

    echo "<script>alert('one or more inputs are empty');</script>";
  } else {



    $email = $_POST['email'];
    $adminname = $_POST['adminname'];
    $password = $_POST['password'];

    var_dump($email);
    var_dump($adminname);
    var_dump($password);


    $insert = $conn->prepare("INSERT INTO admins(email, adminname, mypassword)
       VALUES(:email, :adminname, :mypassword)");

    $insert->execute([
      ":email" => $email,
      ":adminname" => $adminname,
      ":mypassword" => password_hash($password, PASSWORD_DEFAULT),
    ]);

    //  header("Location: login.php");

    echo "<script> window.location.href='" . ADMINURL . "/admins/admins.php';</script>";

    //  $confirmpassword = $_POST[''];
  }
}





?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Categories</h5>
        <form method="POST" action="" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="icon" id="form2Example1" class="form-control" placeholder="icon" />
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-outline mb-4 mt-4">
            <label>Image</label>

            <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
          </div>


          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


        </form>

      </div>
    </div>
  </div>
</div>
</div>

<?php require "../layouts/footer.php"; ?>