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
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Bucher_Domain_Repository_BuchungRepository extends Tx_Extbase_Persistence_Repository {
    
        /*
         * Findet alle Reservierungen welche mit dem Datum und dem Schichttyp übereinstimmen.
         * @param $date Datum 
         * @param $type Schichttyp (bolean)
         * @return Objectarray
         */
        
         Public Function findByTypeAndDate($date,$type) {
                        $query = $this->createQuery();
                        Return $query->matching(
                                                $query->logicalAnd( $query->equals('datum', $date),
                                                                                      $query->equals('schicht', $type) )
                                                            )->execute();
        }
}
?>