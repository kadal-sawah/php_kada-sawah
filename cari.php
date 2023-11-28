<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
$connect = @new mysqli('localhost', 'root', 'root', 'testdb');
if ($connect->connect_error) {
    error_log('gagal... : ' . $connect->connect_error);
}
?>

<?php
    $getCari = trim($_POST['carihobi']);
    $cari = $connect->query("
    SELECT
    hobi.id,
    hobi.hobi,
    hobi.person_id,
    person.id,
    person.nama,
    person.alamat
    FROM hobi
    INNER JOIN person
    ON hobi.person_id = person.id
    WHERE hobi LIKE '%".$getCari."%'");
    $results = $cari->fetch_all(MYSQLI_ASSOC);
?>
<!-- <pre> -->
<?php //print_r($results);?>
<!-- </pre> -->

<table border="2">
    <tr>
        <th colspan="4">Searc by Hobi</th>
    </tr>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Hobi</th>
        <th>Alamat</th>
    </tr>
    <?php $no = 1;?>
    <?php foreach($results as $row){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['hobi']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td>
        <a href="../tera/soal3a.php">kembali</a>
        </td>
    </tr>
</table>

</body>
</html>