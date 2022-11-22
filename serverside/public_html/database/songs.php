<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/incl/init.php');

$artist_id = isset($_GET['artist_id']) && !empty($GET['artist_id'])
                ? (int)$_GET['artist_id'] : 0;

echo $sql = "SELECT song, title,artist.name
        FROM song 
        JOIN artist
        ON song.artist_id = artist_id
        WHERE song.artist_id = :artist_id";

$statement = $db->prepare($sql);
$statement->bindParam(':artist:id', $artist_id);
$statement->execute();

$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($rows);