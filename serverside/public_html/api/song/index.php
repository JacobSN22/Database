<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/init.php";

Route::add('/api/song/', function() {
	$song = new Song;
    $result = $song->list();
    echo Tools::jsonParser($result);
});

Route::add('/api/song/([0-9]*)', function($id) {
	$song = new Song;
    $result = $song->details($id);
    echo Tools::jsonParser($result);
});

Route::add('/api/song/', function() {
	$song = new Song;
    $song->title = isset($_POST["title"]) && !empty($_POST["title"]) ? $_POST["title"] : false;
    $song->content = isset($_POST["content"]) && !empty($_POST["content"]) ? $_POST["content"] : false;
    $song->artist_id = isset($_POST["artist_id"]) && !empty($_POST["artist_id"]) ? $_POST["artist_id"] : false;
    var_dump($_POST);
}, "post");

Route::add('/api/song/', function() {
    $song = new Song;
    $song->id = (int)$_PUT['id'];
    $song->title = (string)$_PUT['title'];
    $song->content = (string)$_PUT['content'];
    $song->artist_id = (string)$_PUT['artist_id'];
    $song->created_at = (int)$_PUT['created_at'];
    $song->updated_at = (int)$_PUT['updated_at'];
    $song->update();
}, "put");


Route::add('/api/song/([0-9]*)', function($id) {
    $song = new Song;
    $song->delete($id);
}, "delete");

Route::run('/');