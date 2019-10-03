<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 // error_reporting(0);
 require_once ('../functions.php');

if(isset($_GET) && !empty($_GET)) {
    echo json_encode($_GET['id']);
}