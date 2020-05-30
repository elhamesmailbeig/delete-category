<?php

require '../functions.php';

$db=connectToMysql();
$id=$_GET["id"];

$query="DELETE FROM products WHERE id=$id";
$result=$db->query($query);
if($result == false){
    echo "the query has error";
}

header("location:list.php");



?>