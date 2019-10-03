<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
error_reporting(0);
require_once ('../functions.php');
header('Content-Type: application/json');


function getFactures (Mission $mission){
    $factureManager = new FactureManager();
    $factures =$factureManager->readWhereFkMission($mission);
    if (is_array($factures)){
        $i=0;
        foreach ($factures as $facture) {
            $factureArray[$i]=[
                'id' =>$facture->getId(),
                'raison' =>$facture->getRaison(),
                'dateNdf' =>$facture->getDateNDF(),
                'comCommercial' =>$facture->getComCommercial(),
                'remboursement' =>$facture->getRemboursement(),
                'comComptable' =>$facture->getComComptable(),
                'montant' =>$facture->getMontant(),
                'fkMission' =>$facture->getFkMission(),
            //  'photo' =>$facture->getPhoto()
            ];
            $i++;
    }
    } else {
        $factureArray=(array)[
            0 =>[
                'id' =>$factures->getId(),
                'raison' =>$factures->getRaison(),
                'dateNdf' =>$factures->getDateNDF(),
                'comCommercial' =>$factures->getComCommercial(),
                'remboursement' =>$factures->getRemboursement(),
                'comComptable' =>$factures->getComComptable(),
                'montant' =>$factures->getMontant(),
                'fkMission' =>$factures->getFkMission(),
                // 'photo' =>$factures->getPhoto()
            ]
        ];
    }
    return($factureArray);
}

if(isset($_GET) && !empty($_GET)) {
    //call Missions from Database
    // $decodedData= intval(json_decode($postData));
    $commercialUser = new Commercial();
    $commercialUser->setId($_GET['id']);
    $missionManager = new MissionManager();
    $missions = $missionManager->readWhereFkCommercial($commercialUser);

    if (is_array($missions)){
        $i=0;
        foreach ($missions as $mission){
            $missionArray[$i]=[
                'id'=>$mission->getId(),
                'nom'=>$mission->getNom(),
                'statut'=>$mission->getStatut(),
                'fkCommercial'=>$mission->getFkCommercial(),
                'factures'=> getFactures($mission)
            ];
            $i++;
        }
    } else {
        $missionArray=(array) [
            0 => [
                'id'=>$missions->getId(),
                'nom'=>$missions->getNom(),
                'statut'=>$missions->getStatut(),
                'fkCommercial'=>$missions->getFkCommercial(),
                'factures'=> getFactures($missions)
            ]
        ];
    }   
    echo json_encode($missionArray);

} else {
   http_response_code(400);
}
