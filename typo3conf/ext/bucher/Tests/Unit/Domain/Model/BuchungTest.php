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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Bucher_Domain_Model_Buchung.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage bucher
 *
 * @author Philipp Bucher <bucher@navigate.de>
 */
class Tx_Bucher_Domain_Model_BuchungTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Bucher_Domain_Model_Buchung
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Bucher_Domain_Model_Buchung();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameForStringSetsName() { 
		$this->fixture->setName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getName()
		);
	}
	
	/**
	 * @test
	 */
	public function getDatumReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDatumForStringSetsDatum() { 
		$this->fixture->setDatum('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDatum()
		);
	}
	
	/**
	 * @test
	 */
	public function getUhrzeitReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setUhrzeitForStringSetsUhrzeit() { 
		$this->fixture->setUhrzeit('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getUhrzeit()
		);
	}
	
	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail() { 
		$this->fixture->setEmail('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getEmail()
		);
	}
	
	/**
	 * @test
	 */
	public function getTelefonReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTelefonForStringSetsTelefon() { 
		$this->fixture->setTelefon('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTelefon()
		);
	}
	
	/**
	 * @test
	 */
	public function getPersonenReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getPersonen()
		);
	}

	/**
	 * @test
	 */
	public function setPersonenForIntegerSetsPersonen() { 
		$this->fixture->setPersonen(12);

		$this->assertSame(
			12,
			$this->fixture->getPersonen()
		);
	}
	
	/**
	 * @test
	 */
	public function getUnterschriftReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setUnterschriftForStringSetsUnterschrift() { 
		$this->fixture->setUnterschrift('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getUnterschrift()
		);
	}
	
	/**
	 * @test
	 */
	public function getNotizReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNotizForStringSetsNotiz() { 
		$this->fixture->setNotiz('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getNotiz()
		);
	}
	
	/**
	 * @test
	 */
	public function getSchichtReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setSchichtForStringSetsSchicht() { 
		$this->fixture->setSchicht('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getSchicht()
		);
	}
	
	/**
	 * @test
	 */
	public function getTischReturnsInitialValueForObjectStorageContainingTx_Bucher_Domain_Model_Tisch() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getTisch()
		);
	}

	/**
	 * @test
	 */
	public function setTischForObjectStorageContainingTx_Bucher_Domain_Model_TischSetsTisch() { 
		$tisch = new Tx_Bucher_Domain_Model_Tisch();
		$objectStorageHoldingExactlyOneTisch = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneTisch->attach($tisch);
		$this->fixture->setTisch($objectStorageHoldingExactlyOneTisch);

		$this->assertSame(
			$objectStorageHoldingExactlyOneTisch,
			$this->fixture->getTisch()
		);
	}
	
	/**
	 * @test
	 */
	public function addTischToObjectStorageHoldingTisch() {
		$tisch = new Tx_Bucher_Domain_Model_Tisch();
		$objectStorageHoldingExactlyOneTisch = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneTisch->attach($tisch);
		$this->fixture->addTisch($tisch);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneTisch,
			$this->fixture->getTisch()
		);
	}

	/**
	 * @test
	 */
	public function removeTischFromObjectStorageHoldingTisch() {
		$tisch = new Tx_Bucher_Domain_Model_Tisch();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($tisch);
		$localObjectStorage->detach($tisch);
		$this->fixture->addTisch($tisch);
		$this->fixture->removeTisch($tisch);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getTisch()
		);
	}
	
}
?>