<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/incl/init.php');

$params = array(
    'id' => array(2, PDO::PARAM_INT)
);
$sql = " SELECT * FROM song WHERE id = :id";
$result = $db->query($sql, $params);
var_dump($result);