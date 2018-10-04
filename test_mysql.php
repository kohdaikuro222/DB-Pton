<!DOCTYPE html>
<html>
<head>
<title>Database</title>
<meta charset="utf-8">
</head>
<style>
#add a {
    color : white;
    background : skyblue;
    width : 100px;
    height : 20px;
    text-decoration : none
}
</style>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Detail</th>
    </tr>
<?php
header("Content-type: text/html; charset=utf-8");
echo '<h1>', "Database" ,'</h1>';
require_once("sql_connection.php");
$pdo = db_connect();
foreach ( $pdo->query ( 'select * from testtable' ) as $row ) {
?>
    <tr>
    <td class = "elements"><?=$row['ID']?></td>
    <td class = "elements"><?=$row['name']?></td>
    <td class = "elements"><?=$row['price']?></td>
    <td class = "elements"><?=$row['detail']?></td>
    <td>
		<form action="test_edit.php" method="post">
		<input type="submit" value="Edit">
		<input type="hidden" name="ID" value="<?=$row['ID']?>">
        <input type="hidden" name="Name" value="<?=$row['name']?>">
        <input type="hidden" name="Price" value="<?=$row['price']?>">
        <input type="hidden" name="Detail" value="<?=$row['detail']?>">
		</form>
	</td>
    <td>
		<form action="test_delete.php" method="post">
		<input type="submit" value="Delete" onsubmit="return confirm('Are you sure you want to submit this form?');">
        <input type="hidden" name="ID" value="<?=$row['ID']?>">
        <input type="hidden" name="Name" value="<?=$row['name']?>">
        <input type="hidden" name="Price" value="<?=$row['price']?>">
        <input type="hidden" name="Detail" value="<?=$row['detail']?>">
		</form>
	</td>
    </tr>
<?php
}
?>
</table>
<p id = add><a href = "./test_add.html"> Add Data </a></p>
</body>
</html>