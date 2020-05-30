<?php
require '../functions.php';

$id = $_GET["id"];

$db=connectToMysql();

if(isPostMethod()){
    $name=$_POST["name"];
    $price=$_POST["price"];
    $quantity=$_POST["quantity"];
    $description=$_POST["description"];
    $categoryId=$_POST["category_id"];

    $query="UPDATE products
     SET name='$name' , price='$price' , quantity='$quantity' , description='$description', category_id='$categoryId'
      WHERE id='$id'";

    $result=$db->query($query);
    echo "product updated";
}




$query="SELECT id,name,price,quantity,description,category_id 
        FROM products
        WHERE id=$id";

$result=$db->query($query);
$product=$result->fetch_assoc();

$query2="SELECT id,name FROM categories";
$result2=$db->query($query2);
$categories=$result2->fetch_all(MYSQLI_ASSOC);


$temp="*";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Name:<input type="text" name="name" value="<?= $product['name'] ?>"/></label> <br>
        <label>Price:<input type="text" name="price" value='<?= $product['price'] ?>'/></label> <br>
        <label>Quantity:<input type="text" name="quantity" value='<?= $product['quantity'] ?>'/></label> <br>
        <label>Description:<textarea name="description" ><?= $product['description'] ?></textarea></label> <br>
        <label>Categories :
                <select name="category_id">
                    <?php   
                        foreach($categories as $category){
                            echo "<option value='$category[id]'"; 
                            if($category['id']==$product['category_id']){echo 'selected';} 
                            echo " >$category[name]</option>" ;
                        }
                    ?>
                </select>
        </label> <br>
        <input type="submit" value="ذخیره" />
    </form>
</body>


</html>