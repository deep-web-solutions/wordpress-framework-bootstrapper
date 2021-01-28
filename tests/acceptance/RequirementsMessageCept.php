<?php

namespace acceptance;

use AcceptanceTester;
use function DeepWebSolutions\Framework\dws_wp_framework_check_php_wp_requirements_met;

/**
 * @since   1.0.0
 * @version 1.0.0
 * @package acceptance
 */
class RequirementsMessageCept {
	public function checkIfMessage( AcceptanceTester $I ) {
		$I->loginAsAdmin();
		$I->amOnAdminPage('/');


		$I->expect('requirements notice should be displayed');
		$I->seeElement('.dws-requirements-error');

		$I->expect('requirements notice should NOT be displayed');
		$I->dontSeeElement('.dws-requirements-error');

	}
}
