<?php

    require '../functions.php';
    $db=connectToMysql();

    $id=$_GET["id"];
    
    $query="SELECT * FROM products INNER JOIN categories ON products.category_id=categories.id AND categories.id=$id";

    $result=$db->query($query);

    if($result == false){
        echo "error in query";
        echo $db->error;
    }

    $info=$result->fetch_all();

    $isDependent  =(count($info)>0)?true:false;

    if($isDependent){
        echo "you cant delete this record , it has dependencies ...";
    }
    
    else{
       $query="DELETE FROM categories WHERE id=$id";
       $result=$db->query($query);
       if($result ==false){
           echo "error in query";
       }
       echo "category deleted successfully ";
       header("location:list.php");
    }
?>