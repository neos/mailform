<?php
namespace TYPO3\MailForm\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "MailForm".                   *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * MailForm controller for the MailForm package
 */
class MailFormController extends \TYPO3\FLOW3\MVC\Controller\ActionController {

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * @return void
	 */
	public function indexAction() {
	}

	/**
	 * @param string $name
	 * @param string $email
	 * @param string $message
	 * @FLOW3\Validate("$name", type="NotEmpty")
	 * @FLOW3\Validate("$email", type="EmailAddress")
	 * @FLOW3\Validate("$message", type="StringLength", options={ "minimum"=3 })
	 * @return void
	 */
	public function sendMailAction($name, $email, $message) {
		$mail = new \TYPO3\SwiftMailer\Message();
		$mail
			->setFrom(array($email => $name))
			->setTo(array($this->settings['to']['email'] => $this->settings['to']['name']))
			->setSubject($this->settings['subjectPrefix'] . current(explode(PHP_EOL, $message)))
			->setBody($message)
			->send();
		$this->redirect('sentMail');
	}

	/**
	 * @return void
	 */
	public function sentMailAction() {
	}

}

?>