<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once ('../functions.php');
$newUser= new Comptable();
$dataManager= new  UserManager();

$newUser->setNom('Jean');
$newUser->setPrenom('Michel');
$newUser->setTelephone('0684356098');
$newUser->setEmail('testmdp@gmail.fr');


$newUser->setMdp(password_hash("patoche", PASSWORD_DEFAULT));


$dataManager->create($newUser);