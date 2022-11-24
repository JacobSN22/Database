<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/assets/incl/init.php";

Route::add('/api/user/', function() {
	$user = new User;
    $result = $user->list();
    echo Tools::jsonParser($result);
});

Route::add('/api/user/([0-9]*)', function($id) {
    $user = new User;
    $result = $user->details($id);
    echo Tools::jsonParser($result);
});

Route::add('/api/user/', function() {
	$user = new User;
    $user->name = isset($_POST["name"]) && !empty($_POST["name"]) ? $_POST["name"] : false;
    $user->lastname = isset($_POST["lastname"]) && !empty($_POST["lastname"]) ? $_POST["lastname"] : false;
    $user->username = isset($_POST["username"]) && !empty($_POST["username"]) ? $_POST["username"] : false;
    $user->password = isset($_POST["password"]) && !empty($_POST["password"]) ? $_POST["password"] : false;
    $user->email = isset($_POST["email"]) && !empty($_POST["email"]) ? $_POST["email"] : false;
    var_dump($_POST);
}, "post");


Route::add('/api/user/', function() {
    $user = new User;
    $user->id = (int)$_PUT['id'];
    $user->name = (string)$_PUT['name'];
    $user->lastname = (string)$_PUT['lastname'];
    $user->username = (string)$_PUT['username'];
    $user->password = (string)$_PUT['password'];
    $user->email = (string)$_PUT['email'];
    $user->update();
}, "put");


Route::add('/api/user/([0-9]*)', function($id) {
    $user = new User;
    $user->delete($id);
}, "delete");

Route::run('/');