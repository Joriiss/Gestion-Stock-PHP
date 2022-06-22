<?php

require_once '../../config/appConfig.php';
require_once '../../src/utils/functions.php';

$bdd = connectBdd($infoBdd);
if ($bdd) :
    $values = array(
        $name = $_POST['name'],
        $description = $_POST['description'],
        $token = randomToken(16),
        $price = $_POST['price'],
        $stock = $_POST['stock'],
        $reference = $_POST['reference'],
        $createDate = date('d-m-y h:i:s'),
        $updateDate = date('d-m-y h:i:s')
    );

    addProduct($bdd, $values);
    header("Location: ../../dist/products.php");
    exit();

else : ?>
    <p>Cannot connect to the database</p>
<?php endif ?>