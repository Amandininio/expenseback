<?php
/**
 *
 */
class NoteDeFrais extends Entity {

  private $raison, $dateNDF, $comCommercial, $remboursement, $comComptable, $fkMission;
  private $raisonPossible=[  ];

  public function getRaison(){
    return $this->raison;
  }

  public function getDateNDF(){
    return $this->dateNDF;
  }

  public function getComCommercial(){
    return $this->comCommercial;
  }

  public function getRemboursement(){
    return $this->remboursement;
  }

  public function getComComptable(){
    return $this->comComptable;
  }

  public function getFkMission(){
    return $this->fkMission;
  }

  public function setRaison(string $raison){
   // if (in_array($raison,$this->raisonPossible)) {
      $this->raison=$raison;
   // }
  }
  public function setFkMission(int $fkMission){
    $this->fkMission = $fkMission;
  }
  public function setComCommercial(string $comCommercial){
    $this->comCommercial = $comCommercial;
  }
  public function setRemboursement(int $remboursement){
    $this->remboursement = $remboursement;
  }

  // public function setComComptable(string $comComptable){
  //   $this->comComptable = $comComptable;
  // }

  public function setDateNDF(string $dateNdf){
    // try{
    //   $dateNdf = New DateTime($dateNDF);
    // }catch (Exception $e){}

    if(isset($dateNdf)){
      $this->dateNDF = $dateNdf;
    }
  }
}
