<?php 


if(isset($_GET['id'])) {

$id = $_GET['id'];

$delete = $conn->query("DELETE FROM categories WHERE id='id");


}

?>




