<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Philipp Bucher <bucher@navigate.de>, Navigate AG
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package bucher
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or late
 */
class Tx_Bucher_Domain_Validator_BuchungValidator extends Tx_Extbase_Validation_Validator_AbstractValidator {
    /**
     * @param Tx_MittwaldTimetrack_Domain_Model_Buchung $Buchung
     */
    Public Function isValid($Buchung) {
      
	$config = array(
	    "maxTables"=>4,
	    "maxPersones"=>20,
	    "noReservation"=>array(
		"24.12.2013","26.03.2013"
                      
	    ),
	    "kuerzel" => array(
		 "rs","sk","kl","ta","db","jb","ec","bf","ng","sh","mh","vk","so","sp","mr","tr","rs","us","as","ls","sw"
	      ),
        "feiertage" =>array(
            "27.03.2013",
            "28.03.2013"
        ),
	 ); 

    //Manager overwrite
	If($Buchung->getUnterschrift() == "sk" ){
	
	//@Todo Kürzelliste vergleichen
	if((string)$Buchung->getPassword() == "penis"){
	return true;
	}else{
            $this->addError (
              "Falsches Passwort für Manager ".$Buchung->getUnterschrift(),
              12657211234 ); 
        return false;
        }

        } else {
      //Checken ob Reservierungen an diesem Tag überhaupt erlaubt sind
          if(in_array($Buchung->getDatum(),$config['noReservation'])){
              $this->addError (
              "Reservierungen sind an diesem Tag nicht erlaubt. Dies Wurde von der Restaurantleitung bestimmt.",
              126572134 );
        return false;
          }
     //Feiertags Validierung
		$datum = $Buchung->getDatum();
		$newdate = explode(".", $datum);
		$day = date("w", mktime(0, 0, 0, $newdate[1], $newdate[0], $newdate[2])) ; 
		if($day == 0 OR $day == 6  OR in_array($datum,$config["feiertage"])){
//wochenende

   }else{
//kein wochenende
       $time = explode(":",$Buchung->getUhrzeit());
       if($time[0]<17){
           $this->addError (
              "An diesem Tag gibt es keine Frühschicht!",
              126572134 );
        return false;
       }
   }
//    if(!in_array($Buchung->getDatum(),$config["feiertage"]) AND ""=="" )
	$countPLaetze=0;
		foreach($Buchung->getTisch() as $tisch){
	        $countPLaetze = $countPLaetze + (int)$tisch->getPlaetze();
	        
        }

        if($countPLaetze < $Buchung->getPersonen()){
	        $this->addError (
              "So viele können an diesen Tischen nicht sitzen!".$countPLaetze.$Buchung->getPersonen(),
              1265721023 );
        return false;
        }
    //Checken ob das Kürzel vorhanden ist
         If(!in_array($Buchung->getUnterschrift(),$config['kuerzel']) ){//@Todo Kürzelliste vergleichen
            $this->addError (
              "Unterschrift ist nicht bekannt!",
              1265712324 );
        return false;
        }
    //Inject des Domänen-Repositories für die komplexe Validierung
    //@TODO PDO->Count für den Count einsetzen #5
        $buchungRepository = new Tx_Bucher_Domain_Repository_BuchungRepository();
        $buchungen =$buchungRepository->findByTypeAndDate($Buchung->getDatum(),$Buchung->getSchicht());
        
         foreach ($buchungen as $buchung) {
             $tables = $buchung->getTisch();
             
             foreach($tables as $table){
             
		$count++;
             }
          }
        $email = $Buchung->getEmail();
        $phone = $Buchung->getTelefon();
        
        

        // checken ob gültiges Domänenobjekt
        If(!$Buchung InstanceOf  Tx_Bucher_Domain_Model_Buchung){
            $this->addError (
              "Objekt ist kein valides Buchungsobjekt",
              1265721022 );
        return false;
        }
        
        
        
        
        If(empty($email) AND empty($phone)){
            $this->addError (
              "Es muss eine Kontaktmöglichkeit (E-Mail oder Telefon) angegeben werden.",
              1265721023 );
        return false;
        }
        
   
       $maxTables = $config['maxTables']+1;
        If($count>$config["maxTables"]){        //@Todo Configwert dynamisch laden
           $this->addError (
              "Maximal ".$maxTables." Tische pro Schicht sind erlaubt.",
              1265721025 ); 
           return false;
        }
        
     return true;
        }
    }
}
?>
