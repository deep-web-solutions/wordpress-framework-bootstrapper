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

		$dws_bootstrapper_min_php_version = constant( 'DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_BOOTSTRAPPER_MIN_PHP' );
		$dws_bootstrapper_min_wp_version  = constant( 'DeepWebSolutions\Framework\DWS_WP_FRAMEWORK_BOOTSTRAPPER_MIN_WP' );

		$I->expect('requirements notice should be displayed');
		$I->seeElement('.dws-requirements-error');

		$I->expect('requirements notice should NOT be displayed');
		$I->dontSeeElement('.dws-requirements-error');

		/*
		if ( ! dws_wp_framework_check_php_wp_requirements_met( $dws_bootstrapper_min_php_version, $dws_bootstrapper_min_wp_version ) ) {
		 	$I->see( 'Your environment doesn\'t meet all of the system requirements listed below' );
		} else {

		}*/
	}
}
