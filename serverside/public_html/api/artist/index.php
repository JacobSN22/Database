<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/init.php";   

Route::add('/api/artist/', function() {
	$artist = new Artist;
    $result = $artist->list();
    echo Tools::jsonParser($result);
});

Route::add('/api/artist/([0-9]*)', function($id) {
    $artist = new Artist;
    $result = $artist->details($id);
    echo Tools::jsonParser($result);
});

Route::add('/api/artist/', function() {
	$artist = new Artist;
    $artist->name = isset($_POST["name"]) && !empty($_POST["name"]) ? $_POST["name"] : false;
    var_dump($_POST);
}, "post");

Route::add('/api/artist/', function() {
    $artist = new Artist;
    $artist->id = (int)$_PUT['id'];
    $artist->name = (string)$_PUT['name'];
    $artist->created_at = (int)$_PUT['created_at'];
    $artist->updated_at = (int)$_PUT['updated_at'];
    $artist->update();
}, "put");


Route::add('/api/artist/([0-9]*)', function($id) {
    $artist = new Artist;
    $artist->delete($id);
}, "delete");

Route::run('/');