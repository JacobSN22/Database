<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/init.php";


Route::add('/api/brugere/', function() {
	$brugere = new Brugere;
    $result = $brugere->list();
    echo Tools::jsonParser($result);
});

Route::add('/api/brugere/([0-9]*)', function() {
	echo 'Hent Liste';
});
Route::run('/');