<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    //redirect them to you desired location
    header('location: http://localhost/online-shop/Freshcery/index.php');
    exit;
}



try{
//host
define("HOST","localhost");

//dbname
define("DBNAME", "online-shop");

//user
define("USER","root");

//pass
define("PASS","");


$conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";", USER, PASS);
$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// if($conn == true) {
//     echo "Success";
// } else {
//     echo "error";
// }
} catch (PDOException $e) {
    echo $e->getMessage();
}