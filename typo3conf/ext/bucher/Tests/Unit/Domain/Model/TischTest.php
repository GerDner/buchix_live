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
 * Test case for class Tx_Bucher_Domain_Model_Tisch.
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
class Tx_Bucher_Domain_Model_TischTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Bucher_Domain_Model_Tisch
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Bucher_Domain_Model_Tisch();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getNumberReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getNumber()
		);
	}

	/**
	 * @test
	 */
	public function setNumberForIntegerSetsNumber() { 
		$this->fixture->setNumber(12);

		$this->assertSame(
			12,
			$this->fixture->getNumber()
		);
	}
	
	/**
	 * @test
	 */
	public function getXposReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getXpos()
		);
	}

	/**
	 * @test
	 */
	public function setXposForIntegerSetsXpos() { 
		$this->fixture->setXpos(12);

		$this->assertSame(
			12,
			$this->fixture->getXpos()
		);
	}
	
	/**
	 * @test
	 */
	public function getYposReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getYpos()
		);
	}

	/**
	 * @test
	 */
	public function setYposForIntegerSetsYpos() { 
		$this->fixture->setYpos(12);

		$this->assertSame(
			12,
			$this->fixture->getYpos()
		);
	}
	
	/**
	 * @test
	 */
	public function getTypeReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTypeForStringSetsType() { 
		$this->fixture->setType('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getType()
		);
	}
	
}
?>