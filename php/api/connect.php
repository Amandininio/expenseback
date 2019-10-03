<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 error_reporting(0);
 require_once ('../functions.php');
 

$postdata = file_get_contents("php://input");
$dataManager = new UserManager();
 if(isset($postdata) && !empty($postdata)) {
   
    // Extract the data.
    $decodedData=json_decode($postdata);
    $connectingUser=$dataManager->readWhereEmail($decodedData->email);
   
    if (isset($connectingUser) && !empty($connectingUser) ){
        if (password_verify($decodedData->mdp, $connectingUser->getMdp())) {

            http_response_code(201);
            $okUser = (array) [
                'id' => $connectingUser->getId(),
                'nom' => $connectingUser->getNom(),
                'prenom' => $connectingUser->getPrenom(),
                'telephone' => $connectingUser->getTelephone(),
                'email' => $connectingUser->getEmail(),
                'mdp' => $connectingUser->getMdp(),
                'type' => $connectingUser->getType(),
               // 'entreprise' => $connectingUser->getEntreprise(),
                'fkEntreprise' => $connectingUser->getFkEntreprise()
              ];
            
              echo json_encode($okUser);
              //echo json_encode($okUser['id']);
        } else {
            // wrong password;
            http_response_code(401);
        }

    } else {
        // 'user unknown';
        http_response_code(401);
    }
   
  


  

  // echo json_encode($test);
   // echo json_encode($connectingUser->getNom());

   //$results=$dataManager->read($postdata);
   //$resultat=$results->getNom();
    //echo json_encode($postdata);
 }
else {
    echo json_encode('still nothing');
}