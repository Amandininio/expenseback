<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 error_reporting(0);



// header('Content-Type: application/json');
require_once ('../functions.php');

define('SITE_ROOT', dirname(__FILE__));


$dataManager = new UserManager();
//$userMan = new UserManager();

//URL : http://localhost/expenseManager/php/testread.php?id='value'

// $id=$_GET['id'];

// $user = $userMan->read($id);
// $results=$dataManager->read(1);
$results=$dataManager->readAll();
// echo 'mission';
// var_dump($results);

//var_dump($results);
// echo json_encode(serialize($results));


// $array = array( 'type' => $results->getType(),
 //               'prenom' => $results->getPrenom());
//var_dump ($array);


// echo json_encode($results->getType());
echo json_encode($results);
//var_dump($array);