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
class Tx_Bucher_Domain_Model_Buchung extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * password
	 *
	 * @var string
	 * @dontvalidate
	 */
	protected $password;
	/**
	 * datum
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $datum;

	/**
	 * uhrzeit
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $uhrzeit;

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email;

	/**
	 * telefon
	 *
	 * @var string
	 */
	protected $telefon;

	/**
	 * personen
	 *
	 * @var integer
	 * @validate NotEmpty
	 */
	protected $personen;

	/**
	 * unterschrift
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $unterschrift;

	/**
	 * notiz
	 *
	 * @var string
	 */
	protected $notiz;

	/**
	 * schicht
	 *
	 * @var string
	 */
	protected $schicht;

	/**
	 * tisch
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Bucher_Domain_Model_Tisch>
                      * @validate NotEmpty
	 */
	protected $tisch;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->tisch = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the datum
	 *
	 * @return string $datum
	 */
	public function getDatum() {
		return $this->datum;
	}

	/**
	 * Sets the datum
	 *
	 * @param string $datum
	 * @return void
	 */
	public function setDatum($datum) {
		$this->datum = $datum;
	}

	/**
	 * Returns the uhrzeit
	 *
	 * @return string $uhrzeit
	 */
	public function getUhrzeit() {
		return $this->uhrzeit;
	}

	/**
	 * Sets the uhrzeit
	 *
	 * @param string $uhrzeit
	 * @return void
	 */
	public function setUhrzeit($uhrzeit) {
		$this->uhrzeit = $uhrzeit;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the telefon
	 *
	 * @return string $telefon
	 */
	public function getTelefon() {
		return $this->telefon;
	}

	/**
	 * Sets the telefon
	 *
	 * @param string $telefon
	 * @return void
	 */
	public function setTelefon($telefon) {
		$this->telefon = $telefon;
	}

	/**
	 * Returns the personen
	 *
	 * @return integer $personen
	 */
	public function getPersonen() {
		return $this->personen;
	}

	/**
	 * Sets the personen
	 *
	 * @param integer $personen
	 * @return void
	 */
	public function setPersonen($personen) {
		$this->personen = $personen;
	}

	/**
	 * Returns the unterschrift
	 *
	 * @return string $unterschrift
	 */
	public function getUnterschrift() {
		return $this->unterschrift;
	}

	/**
	 * Sets the unterschrift
	 *
	 * @param string $unterschrift
	 * @return void
	 */
	public function setUnterschrift($unterschrift) {
		$this->unterschrift = $unterschrift;
	}

	/**
	 * Returns the notiz
	 *
	 * @return string $notiz
	 */
	public function getNotiz() {
		return $this->notiz;
	}

	/**
	 * Sets the notiz
	 *
	 * @param string $notiz
	 * @return void
	 */
	public function setNotiz($notiz) {
		$this->notiz = $notiz;
	}

	/**
	 * Returns the schicht
	 *
	 * @return string $schicht
	 */
	public function getSchicht() {
		return $this->schicht;
	}

	/**
	 * Sets the schicht
	 *
	 * @param string $schicht
	 * @return void
	 */
	public function setSchicht($schicht) {
		$this->schicht = $schicht;
	}
	/**
	 * Returns the password
	 *
	 * @return string $password
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Sets the password
	 *
	 * @param string $password
	 * @return void
	 */
	public function setPassword($password) {
		$this->password = $password;
	}
	/**
	 * Adds a Tisch
	 *
	 * @param Tx_Bucher_Domain_Model_Tisch $tisch
	 * @return void
	 */
	public function addTisch(Tx_Bucher_Domain_Model_Tisch $tisch) {
		$this->tisch->attach($tisch);
	}

	/**
	 * Removes a Tisch
	 *
	 * @param Tx_Bucher_Domain_Model_Tisch $tischToRemove The Tisch to be removed
	 * @return void
	 */
	public function removeTisch(Tx_Bucher_Domain_Model_Tisch $tischToRemove) {
		$this->tisch->detach($tischToRemove);
	}

	/**
	 * Returns the tisch
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Bucher_Domain_Model_Tisch> $tisch
	 */
	public function getTisch() {
		return $this->tisch;
	}

	/**
	 * Sets the tisch
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Bucher_Domain_Model_Tisch> $tisch
	 * @return void
	 */
	public function setTisch(Tx_Extbase_Persistence_ObjectStorage $tisch) {
		$this->tisch = $tisch;
	}

}
?>