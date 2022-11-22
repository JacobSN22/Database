<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/incl/init.php');

$sql = "SELECT title
        FROM song
        ORDER BY title ASC";

$stmt = $db->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCHASSOC);

var_dump($result)



//---------------
$keyword = $_GET['keyword'];


$sql = "SELECT title, content
        FROM song
        WHERE title LIKE :keyword;"
$stmt = $db->prepare($sql);
$stmt->bindParam('keyword', '%' . $keyword . '%');
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCHASSOC);

var_dump($result)

?>