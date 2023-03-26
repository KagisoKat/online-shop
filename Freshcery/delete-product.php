<?php require "./includes/header.php"; ?>
<?php require "./config/config.php"; ?>


<?php 
if (!isset($_SESSION['username'])) {
    echo "<script> window.location.href='" . APPURL . "'; </script>";
}

if(isset($_POST['delete'])) {
    
    $id = $_POST['id'];
   
    $delete = $conn->prepare("DELETE FROM cart  WHERE id='$id'");
   
    $delete->execute();

}