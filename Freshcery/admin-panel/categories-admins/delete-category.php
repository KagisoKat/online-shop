<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>


<?php 


if(isset($_GET['id'])) {

$id = $_GET['id'];

$delete = $conn->query("DELETE  FROM categories WHERE id='$id'");
$delete->execute();


echo "<script> window.location.href='".ADMINURL."/categories-admins/show-categories.php';</script>";
}

?>




