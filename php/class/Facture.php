<?php

/**
 * Classe Facture
 *
 * Possède les propriétés et méthodes des classes NoteDeFrais et Entity
 */
class Facture extends NoteDeFrais {
    private $montant, $photo;
    
    public function getMontant(){
        return  $this->montant;
    }
    public function getPhoto(){
        return  $this->photo;
    }

    public function setMontant($montant){
        if ($montant > 0){
            $this->montant = $montant;
        }
    }
    public function setPhoto( $photo){
          //  $blobification=fbsql_create_blob($photo);
            $this->photo = $photo;
    }
}