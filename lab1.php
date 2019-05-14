<!DOCTYPE>
<html>
<head>
<style>
    div.a{text-align:center;}
</style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Abdellah Brahimi
 * Date: 26.03.2019
 * Time: 13:43
 */
$username = "<div class='a'><b>Брахими Абделлах Абделазизович</b></div>";
$gruppa =  "<div class = 'a'> Группа 4315</div>";

echo $username;
echo "<br/>";
echo $gruppa;
echo "<br/>";


$file_name = realpath('C:/xampp/htdocs/Script/input.txt');
echo "<br/>";
$handle = fopen($file_name, "r");
if ($handle == FALSE)
    echo "Ошибка открытия файла!<br/>";
else
    while (!feof($handle))
    {
        $buffer = fgets($handle, 4096);
        echo $buffer;
    }
fclose($handle);
?>
</body>
</html>
