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
class Tx_Bucher_Domain_Model_Tisch extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * number
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $number;
                     /**
	 * plaetze
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $plaetze;
                     /**
	 * number
	 *
	 ** @var Tx_Extbase_Persistence_ObjectStorage<Tx_Bucher_Domain_Model_Buchung>
	 * @validate NotEmpty
	 */
	protected $buchung;

	/**
	 * xpos
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $xpos;

	/**
	 * ypos
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $ypos;

	/**
	 * type
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $type;

	/**
	 * Returns the number
	 *
	 * @return integer $number
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * Sets the number
	 *
	 * @param integer $number
	 * @return void
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * Returns the xpos
	 *
	 * @return integer $xpos
	 */
	public function getXpos() {
		return $this->xpos;
	}

	/**
	 * Sets the xpos
	 *
	 * @param integer $xpos
	 * @return void
	 */
	public function setXpos($xpos) {
		$this->xpos = $xpos;
	}

	/**
	 * Returns the ypos
	 *
	 * @return integer $ypos
	 */
	public function getYpos() {
		return $this->ypos;
	}

	/**
	 * Sets the ypos
	 *
	 * @param integer $ypos
	 * @return void
	 */
	public function setYpos($ypos) {
		$this->ypos = $ypos;
	}

	/**
	 * Returns the type
	 *
	 * @return string $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param string $type
	 * @return void
	 */
	public function setType($type) {
		$this->type = $type;
	}
                    /**
	 * Returns the plaetze
	 *
	 * @return string $plaetze
	 */
	public function getPlaetze() {
		return $this->plaetze;
	}

	/**
	 * Sets the plaetze
	 *
	 * @param string $plaetze
	 * @return void
	 */
	public function setPlaetze($plaetze) {
		$this->plaetze = $plaetze;
	}

}
?>