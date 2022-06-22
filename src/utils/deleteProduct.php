<?php

require_once '../../config/appConfig.php';
require_once '../../src/utils/functions.php';

$bdd = connectBdd($infoBdd);
if ($bdd) :
    $token=$_GET['token'];
    deleteProduct($bdd, $token);
    header("Location: ../../dist/products.php");
    exit();

else : ?>
    <p>Cannot connect to the database</p>
<?php endif ?>