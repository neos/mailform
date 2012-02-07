<?php
namespace TYPO3\MailForm\TypoScript;

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
 * @FLOW3\Scope("prototype")
 */
class Plugin extends \TYPO3\TYPO3\TypoScript\Plugin {

	protected $package = 'TYPO3.MailForm';
	protected $controller = 'MailForm';
	protected $action = 'index';

}
?>