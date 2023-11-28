<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soal 1 B</title>
</head>
<body>
    <!-- <pre> -->
        <?php //echo print_r($_POST);?>
    <!-- </pre> -->
    <?php
        $jbaris = $_POST['jbaris'];
        $jkolom = $_POST['jkolom'];
    ?>
    <form action="/tera/soal1c.php" method="post">
        <table>
            <?php for($i=0; $i<$jbaris; $i++){ ?>
                <tr>
                    <?php for($x=0; $x<$jkolom; $x++) { ?>
                        <td>
                            <label for="listArray">
                                <?php echo $i+1 ;?>.<?php echo $x+1; ?>
                            </label>
                            <input type="text" name="listArray[]">
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>

            <tr>
                <td>
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>