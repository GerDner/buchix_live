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
class Tx_Bucher_Controller_BuchungController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * buchungRepository
	 *
	 * @var Tx_Bucher_Domain_Repository_BuchungRepository
	 */
	protected $buchungRepository;

	/**
	 * injectBuchungRepository
	 *
	 * @param Tx_Bucher_Domain_Repository_BuchungRepository $buchungRepository
	 * @return void
	 */
	public function injectBuchungRepository(Tx_Bucher_Domain_Repository_BuchungRepository $buchungRepository) {
		$this->buchungRepository = $buchungRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
	
                        $tischRepository = new Tx_Bucher_Domain_Repository_TischRepository();

                        $tische =$tischRepository->findAll();
                        $this->view->assign('tables', $tische);

                        $buchungen =$this->buchungRepository->findAll();
                        $this->view->assign("buchungen",$buchungen);
            
	}

	/**
	 * action new
	 *
	 * @param Tx_Bucher_Domain_Model_Buchung $newBuchung
	 * @dontvalidate $newBuchung
	 * @return void
	 */
	public function newAction(Tx_Bucher_Domain_Model_Buchung $newBuchung = NULL) {
                            $tischRepository = new Tx_Bucher_Domain_Repository_TischRepository();

                            $tische =$tischRepository->findAll();

                            $this->view->assign('tables', $tische);
                            $this->view->assign('newBuchung', $newBuchung);
	}

	/**
	 * action create
	 *
	 * @param Tx_Bucher_Domain_Model_Buchung $newBuchung      
	 * @return void
	 */
	public function createAction(Tx_Bucher_Domain_Model_Buchung $newBuchung) {
                                                    
//                                                     $sendMail = $this->sendTemplateEmail(
//					array("info@lindenbraeu-waldbronn.de" => "Rald Stoerzbach"),
//					array("info@buchix.de" => "Buchix"),
//					"Buchix: Neue Reservierung im Lindenbräu Waldbronn",
//					'Activation',
//					array(
//						'empfaenger' => "Philipp Bucher",
//						'buchung' => $newBuchung,
//						'absender' => "Buchix",
//                                                                   'date'=> date("F j, Y, g:i a")
//					)
//				);
                        $this->buchungRepository->add($newBuchung);
                        
     
                       return "1";


		
	}

	/**
	 * action edit
	 *
	 * @param Tx_Bucher_Domain_Model_Buchung $buchung
     * @dontvalidate $buchung         
	 * @return void
	 */
	public function editAction(Tx_Bucher_Domain_Model_Buchung $buchung) {
		$this->view->assign('buchung', $buchung);

	}

	/**
	 * action update
	 *
	 * @param Tx_Bucher_Domain_Model_Buchung $buchung
	 * @ignorevalidation $buchung
	 * @return void
	 */
	public function updateAction(Tx_Bucher_Domain_Model_Buchung $buchung) {
		$this->buchungRepository->update($buchung);

		return '1';
	}

	/**
	 * action delete
	 *
	 * @param Tx_Bucher_Domain_Model_Buchung $buchung
     * @dontvalidate $buchung            
	 * @return void
	 */
	public function deleteAction(Tx_Bucher_Domain_Model_Buchung $buchung) {
		$this->buchungRepository->remove($buchung);
                      return '1';
	}

	/**
	 * action
	 *@param string $date
            * @param string $type
	 * @return void
	 */
	public function ajaxlistAction($date = '*', $type = "*") {
                         $tischRepository = new Tx_Bucher_Domain_Repository_TischRepository();

                        $tische =$tischRepository->findAll();
                        $buchungen =$this->buchungRepository->findByTypeAndDate($date,$type);
                        $this->view->assign("buchungen",$buchungen); 
                       

                        $this->view->assign('tables', $tische);
    //                     foreach ($buchungen as $blog) {
    //                          Tx_ExtDebug::var_dump($blog);
    //                        }
 
	}
    /**
        * @param array $recipient recipient of the email in the format array('recipient@domain.tld' => 'Recipient Name')
        * @param array $sender sender of the email in the format array('sender@domain.tld' => 'Sender Name')
        * @param string $subject subject of the email
        * @param string $templateName template name (UpperCamelCase)
        * @param array $variables variables to be passed to the Fluid view
        * @return boolean TRUE on success, otherwise false
        */
        protected function sendTemplateEmail(array $recipient, array $sender, $subject, $templateName, array $variables = array()) {
            $emailView = $this->objectManager->create('Tx_Fluid_View_StandaloneView');
            $emailView->setFormat('html');
            $extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
            $templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
            $templatePathAndFilename = $templateRootPath . 'Email/' . $templateName . '.html';
            $emailView->setTemplatePathAndFilename($templatePathAndFilename);
            $emailView->assignMultiple($variables);
            $emailBody = $emailView->render();
            $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('t3lib_mail_Message');
            $message->setTo($recipient)
                  ->setFrom($sender)
                  ->setSubject($subject);

            // Possible attachments here
            //foreach ($attachments as $attachment) {
            //    $message->attach($attachment);
            //}

            // Plain text example
            //$message->setBody($emailBody, 'text/plain');

            // HTML Email
            $message->setBody($emailBody, 'text/html');

            $message->send();
            return $message->isSent();
        }

}
?>