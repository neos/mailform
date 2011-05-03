<?php
declare(ENCODING = 'utf-8');
namespace F3\MailForm\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "MailForm".                   *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * MailForm controller for the MailForm package
 */
class MailFormController extends \F3\FLOW3\MVC\Controller\ActionController {

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
	 * @return void
	 */
	public function sendMailAction($name, $email, $message) {
		$mail = new \F3\SwiftMailer\Message();
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