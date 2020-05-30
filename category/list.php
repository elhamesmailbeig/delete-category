<?php

require '../functions.php';
$db=connectToMysql();
$query="SELECT id,name,enable FROM categories";
$result=$db->query($query);
if($result == false){
    echo "error in query ";
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
    <table border="1">
        <tr>
            <th>row</th>
            <th>name</th>
            <th>enable</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

        <?php $row=0 ; ?>
        <?php foreach($categories as $category): ?>
            <tr>
                <td><?= $row++ ?></td>

                <td><?= $category["name"] ?></td>
                <td><?= ($category["enable"]==1)?'yes':'no'  ?></td>
             
                <td><a href="update.php?id=<?php echo $category["id"] ?>">edit</a></td>
                <td><a href="delete.php?id=<?php echo $category["id"] ?>">delete</a></td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>
</html>