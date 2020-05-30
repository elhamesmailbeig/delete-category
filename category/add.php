
<?php

    require '../functions.php';
    $db=connectToMysql();

    if(isPostMethod()){
        $name=$_POST["name"];
        $isEnable=(int)$_POST["enable"];
        
        $query ="INSERT INTO categories SET name='$name' , enable='$isEnable' ";
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
        name : <input type="text" name="name" /> <br>
        enable : <label>YES<input type="radio" name="enable" value="1" /> </label>
                 <label>NO<input type="radio" name="enable"  value="0"/> </label> <br>

        <input type="submit" value="submit">
    </form>
</body>
</html>