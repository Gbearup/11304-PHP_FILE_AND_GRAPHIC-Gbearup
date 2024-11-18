<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$rows=all('imgs');
echo "<table>";
foreach($rows as $file){
    echo "<tr>";
    echo " <td><img src='files/{$file['filename']}'></td>";
    echo " <td>{$file['desc']}</td>";
    echo " <td><a href='del_img.php?id={$file['id']}'>刪除</a></td>";
    echo " <td><a href='re_upload.php?id={$file['id']}'>重新上傳</a></td>";
    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>