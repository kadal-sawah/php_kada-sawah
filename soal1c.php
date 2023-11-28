<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soal 1 C</title>
</head>
<body>

<?php
$barisArray = count($_POST['listArray']);
//echo $barisArray;
?>

<?php for($i=0; $i<$barisArray; $i++){ ?>
    1.<?php echo $i+1;?>: <?php echo $_POST['listArray'][$i];?> </br>
<?php } ?>

</body>
</html>