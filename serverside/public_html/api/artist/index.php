<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/init.php";


Route::add('/api/artist/', function() {
	$artist = new Artist;
    $result = $artist->list();
    echo Tools::jsonParser($result);
});

Route::add('/api/artist/([0-9]*)', function() {
	echo 'Hent Liste';
});
Route::run('/');