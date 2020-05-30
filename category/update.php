<?php

require '../functions.php';
$db=connectToMysql();

$id = (int)$_GET["id"];
$query="SELECT id,name,enable FROM categories WHERE id=$id";
$result=$db->query($query);
if($result == false){
    echo "error in query ";
}

$category = $result ->fetch_assoc();

if(isPostMethod()){
    $name=$_POST["name"];
    $isEnable=(int)$_POST["enable"];
        
    $query ="UPDATE categories SET name='$name' , enable='$isEnable' WHERE id=$id";
    $result=$db->query($query);
    
    if($result == false){
        echo "query has error ";
        echo $db->error;
        }
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        name : <input type="text" name="name" value='<?= $category["name"] ?>' /> <br>
        enable : <label>YES<input type="radio" name="enable" value="1" <?php if($category["enable"]==1) echo 'checked' ?> /> </label>
                 <label>NO<input type="radio" name="enable"  value="0" <?php if($category["enable"]==0) echo 'checked' ?> /> </label> <br>

        <input type="submit" value="submit">
    </form>
</body>
</html>