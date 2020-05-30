<?php
    
    require '../functions.php';

    $db=connectToMysql();

   // $query = "SELECT name , price, category_id FROM products";

    $query="SELECT p.id, p.name,p.price,c.name as category_name
            FROM products as p
             INNER JOIN
              categories as c ON  p.category_id=c.id ORDER BY category_name";


    $result=$db->query($query);

    if($result == false){
        echo "Query Error";
        exit;
    }

    $products =$result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>price</th>
            <th>category</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            $solution2=false;

            $i=1;
            foreach($products as $product):
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $product["name"] ?></td>
                <td><?= $product["price"] ?></td>
                <td><?= $product["category_name"] ?></td>

                <?php if($solution2): ?>
                <td><?= getCategoryName($product["category_id"]) ?></td>
                <?php endif; ?>

                <td><a href="update.php?id=<?php echo $product["id"] ?>">edit</a></td>
                <td><a href="delete.php?id=<?php echo $product["id"] ?>">delete</a></td>

            </tr>
        <?php
            $i++;
            endforeach;
        ?>
    </table>
</body>
</html>