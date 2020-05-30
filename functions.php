<?php

   function connectToMysql(){
        $db=@mysqli_connect('localhost','root','','shop');
        if($db == false){
            echo "error connecting to Database";
        }
        $db->query("SET NAMES 'utf8'");
        return $db;
   }

   function isPostMethod(){
       return ($_SERVER["REQUEST_METHOD"] === "POST");
   }

   function getCategoryName($categoryId){
       global $db;
       $query="SELECT name FROM categories WHERE id=$categoryId";
       $result=$db->query($query);
       $category=$result->fetch_assoc();
       return $category['name'];
   }
?>
