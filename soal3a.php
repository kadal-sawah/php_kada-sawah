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
    $hobi = $connect->query("SELECT * FROM hobi LIMIT 5");
    $resultHobi = $hobi->fetch_all(MYSQLI_ASSOC);

    $person = $connect->query("SELECT * FROM person LIMIT 5");
    $resultPerson = $person->fetch_all(MYSQLI_ASSOC);

    $joinhobi = $connect->query("
    SELECT
    hobi,
    COUNT(hobi) AS `jumlah person`
    FROM
    hobi
    GROUP BY
    hobi
    ORDER BY
    `jumlah person` DESC;
    ");
    $results = $joinhobi->fetch_all(MYSQLI_ASSOC);
?>

<table border="1">
    <tr>
        <th colspan="4">Hobi</th>
    </tr>
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Person ID</th>
        <th>Hobi</th>
    </tr>
    <?php $no = 1;?>
    <?php foreach($resultHobi as $row){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['person_id']; ?></td>
            <td><?php echo $row['hobi']; ?></td>
        </tr>
    <?php } ?>
</table>

<table border="1">
    <tr>
        <th colspan="4">Person</th>
    </tr>
    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
    </tr>
    <?php $no = 1;?>
    <?php foreach($resultPerson as $row){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
        </tr>
    <?php } ?>
</table>

<!-- <pre>
<?php //var_dump($results)?>
</pre> -->

<table border="2">
    <tr>
        <th colspan="4">Laporan</th>
    </tr>
    <tr>
        <th>No</th>
        <th>Hobi</th>
        <th>Jumlah Person</th>
    </tr>
    <?php $no = 1;?>
    <?php foreach($results as $row){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['hobi']; ?></td>
            <td><?php echo $row['jumlah person']; ?></td>
        </tr>
    <?php } ?>
    <form action="/tera/cari.php" method="post">
        <tr>
            <td>
            <label for="carihobi">Cari by hobi</label>
            </td>
            <td>
            <input type="text" name="carihobi" id="carihobi">
            </td>
            <td>
            <input type="submit" value="Cari">
            </td>
        </tr>
    </form>
</table>

</body>
</html>