<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(0);
require_once ('../functions.php');
header('Content-Type: application/json');

$postdata = file_get_contents("php://input");
$facture= new Facture;
$factureManager = new FactureManager;
if(isset($postdata) && !empty($postdata)) {
    $decoded=json_decode($postdata);
    // echo(json_encode($postdata));

   
    $facture->setId(intval($decoded->id));
    $facture->setRaison($decoded->raison);
    $facture->setDateNDF($decoded->dateNdf);
    $facture->setComCommercial($decoded->comCommercial);
    // $facture->setComComptable($decoded->comComptable);
    $facture->setRemboursement($decoded->remboursement);
    $facture->setMontant($decoded->montant);
    $facture->setFkMission($decoded->fkMission);
    var_dump($facture);
    

    if ($facture->getId() != 0) {
      //  echo ('Updatons la facture');
        $factureManager->update($facture) ;
    } else {
       // echo ('New Facture');
        $factureManager->create($facture);
    }
} 