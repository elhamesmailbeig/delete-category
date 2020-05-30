<?php
    require '../functions.php';
    $db=connectToMysql();
    
    if(isPostMethod()){

        $name= filter_input(INPUT_POST,'name');
        $price=filter_input(INPUT_POST,'price',FILTER_SANITIZE_NUMBER_INT);
        $quantity=filter_input(INPUT_POST,'quantity',FILTER_SANITIZE_NUMBER_INT);
        $categoryId=filter_input(INPUT_POST,'category_id',FILTER_SANITIZE_NUMBER_INT);
        $description=filter_input(INPUT_POST,'description');

        $query="INSERT INTO products
        SET name='$name', price='$price' ,quantity='$quantity',
            description='$description', category_id='$categoryId' ";

        $result=$db->query($query);
        if($result == false){
            echo "Query Error ";
            echo $db->error;
            exit;
        }
        $productId = $db->insert_id;
        echo "product has been added with Id : $productId";

    }

    $query="SELECT id,name FROM categories WHERE enable=1";
    $result=$db->query($query);
    if($result == false){
        echo "Query Error ";
        exit;
    }
    $categories =$result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Name:<input type="text" name="name"/></label> <br>
        <label>Price:<input type="text" name="price"/></label> <br>
        <label>Quantity:<input type="text" name="quantity"/></label> <br>
        <label>Description:<textarea name="description"></textarea></label> <br>
        <label>Categories :
                <select name="category_id">
                    <?php
                        foreach($categories as $category){
                            echo "<option value='$category[id]'>$category[name]</option>";
                        }
                    ?>
                </select>
        </label> <br>
        <input type="submit" value="ذخیره" />
    </form>
</body>
</html>