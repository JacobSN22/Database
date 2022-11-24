<?php
$dns = "mysql:host=localhost;dbname=user;";
$username = "root";
$password = "";

try {
    $db = new PDO($dns, $username, $password);

} catch(PDOException $err) {
    echo "Fejl i tilslutning af database: " . $err;
};

$sql = "CREATE TABLE education (
        id BIGINT(20) NOT NULL AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL DEFAULT 'Ikke navngivet',
        active BOOL NOT NULL DEFAULT 0,
        PRIMARY KEY (id)
    )";

var_dump($db->query($sql));

$sql2 = "SELECT firstname FROM user";
$statement = $db->query($sql2);
$result = $statement->fetchAll();

var_dump($result);

$zipcode = 2100;
$firstname = "Bo";
$sql = "SELECT email 
        FROM user
        WHERE zipcode > :zipcode
        AND firstname = :firstname";

$statement = $db->prepare($sql);

$statement->bindParam(':zipcode', $zipcode);
$statement->bindParam(':firstname', $firstname);

$statement->execute();

$result = $statement->fetchAll();
var_dump($result);


?>