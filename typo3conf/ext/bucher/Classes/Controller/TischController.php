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
class Tx_Bucher_Controller_TischController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * tischRepository
	 *
	 * @var Tx_Bucher_Domain_Repository_TischRepository
	 */
	protected $tischRepository;

	/**
	 * injectTischRepository
	 *
	 * @param Tx_Bucher_Domain_Repository_TischRepository $tischRepository
	 * @return void
	 */
	public function injectTischRepository(Tx_Bucher_Domain_Repository_TischRepository $tischRepository) {
		$this->tischRepository = $tischRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$tisches = $this->tischRepository->findAll();
		$this->view->assign('tisches', $tisches);
	}

	/**
	 * action new
	 *
	 * @param Tx_Bucher_Domain_Model_Tisch $newTisch
	 * @dontvalidate $newTisch
	 * @return void
	 */
	public function newAction(Tx_Bucher_Domain_Model_Tisch $newTisch = NULL) {
		$this->view->assign('newTisch', $newTisch);
	}

	/**
	 * action create
	 *
	 * @param Tx_Bucher_Domain_Model_Tisch $newTisch
	 * @return void
	 */
	public function createAction(Tx_Bucher_Domain_Model_Tisch $newTisch) {
		$this->tischRepository->add($newTisch);
		$this->flashMessageContainer->add('Your new Tisch was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param Tx_Bucher_Domain_Model_Tisch $tisch
	 * @return void
	 */
	public function editAction(Tx_Bucher_Domain_Model_Tisch $tisch) {
		$this->view->assign('tisch', $tisch);
	}

	/**
	 * action update
	 *
	 * @param Tx_Bucher_Domain_Model_Tisch $tisch
	 * @return void
	 */
	public function updateAction(Tx_Bucher_Domain_Model_Tisch $tisch) {
		$this->tischRepository->update($tisch);
		$this->flashMessageContainer->add('Your Tisch was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param Tx_Bucher_Domain_Model_Tisch $tisch
	 * @return void
	 */
	public function deleteAction(Tx_Bucher_Domain_Model_Tisch $tisch) {
		$this->tischRepository->remove($tisch);
		$this->flashMessageContainer->add('Your Tisch was removed.');
		$this->redirect('list');
	}

}
?>