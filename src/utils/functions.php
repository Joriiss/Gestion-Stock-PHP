<?php
function connectBDD($infoBdd)
{
    $host = $infoBdd['host'];
    $dbname = $infoBdd['dbname'];
    return new PDO("mysql:host=$host;dbname=$dbname", $infoBdd['user'], $infoBdd['pass']);
}

function getAllProducts($pdo)
{
    $sql = 'SELECT * FROM products';
    $values = $pdo->prepare($sql);
    $values->execute();
    return $values->fetchAll();
}

function getProduct($pdo, $token)
{
    $sql = 'SELECT * FROM products where token = "'.$token.'"';
    $values = $pdo->prepare($sql);
    $values->execute();
    return $values->fetch();
}

function addProduct($pdo, $datas)
{
    $sql = 'INSERT INTO `products` (`name`, `description`, `token`, `price`, `stock`, `reference`, `createDate`, `updateDate`) VALUES (:name, :description, :token, :price, :stock, :reference, :createDate, :updateDate)';
    $values = $pdo->prepare($sql);
    $values->execute([
        ':name' => $datas[0],
        ':description' => $datas[1],
        ':token' => $datas[2],
        ':price' => $datas[3],
        ':stock' => $datas[4],
        ':reference' => $datas[5],
        'createDate' => $datas[6],
        'updateDate' => $datas[7]
    ]);
}

function updateProduct($pdo, $datas, $token)
{
    $sql = 'UPDATE `products` SET `name`=:name,`description`=:description,`price`=:price,`stock`=:stock, `reference`=:reference,`updateDate`=:updateDate where token = "'.$token.'"';
    var_dump($token);
    $values = $pdo->prepare($sql);
    $values->execute([
        ':name' => $datas[0],
        ':description' => $datas[1],
        ':price' => $datas[2],
        ':stock' => $datas[3],
        ':reference' => $datas[4],
        'updateDate' => $datas[5]
    ]);
}

function deleteProduct($pdo, $token)
{
    $sql = 'DELETE FROM `products` WHERE token = "'.$token.'"';
    $values = $pdo->prepare($sql);
    $values->execute();
}

function getAllUsers($pdo)
{
    $sql = 'SELECT * FROM users';
    $values = $pdo->prepare($sql);
    $values->execute();
    return $values->fetchAll();
}

function getUser($pdo, $token)
{
    $sql = 'SELECT * FROM users where token = "'.$token.'"';
    $values = $pdo->prepare($sql);
    $values->execute();
    return $values->fetch();
}

function addUser($pdo, $datas)
{
    $sql = 'INSERT INTO `users` (`firstname`, `lastname`, `token`, `role`, `createDate`, `updateDate`) VALUES (:firstname, :lastname, :token, :role, :createDate, :updateDate)';
    $values = $pdo->prepare($sql);
    $values->execute([
        ':firstname' => $datas[0],
        ':lastname' => $datas[1],
        ':token' => $datas[2],
        ':role' => $datas[3],
        'createDate' => $datas[4],
        'updateDate' => $datas[5]
    ]);
}

function updateUser($pdo, $datas, $token)
{
    $sql = 'UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`role`=:role, `updateDate`=:updateDate where token = "'.$token.'"';
    var_dump($token);
    $values = $pdo->prepare($sql);
    $values->execute([
        ':firstname' => $datas[0],
        ':lastname' => $datas[1],
        ':role' => $datas[2],
        'updateDate' => $datas[3]
    ]);
}

function deleteUser($pdo, $token)
{
    $sql = 'DELETE FROM `users` WHERE token = "'.$token.'"';
    $values = $pdo->prepare($sql);
    $values->execute();
}

function randomToken($car)
{
    $string = "";
    $chaine =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    srand((float) microtime() * 1000000);
    for ($i = 0; $i < $car; $i++) {
        $string .= $chaine[rand() % strlen($chaine)];
    }
    return $string;
}

