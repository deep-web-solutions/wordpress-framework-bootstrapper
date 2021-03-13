<?php

namespace DeepWebSolutions\Framework\Bootstrapper\Tests\Functional;

use FunctionalTester;

class ExampleCest
{
    public function _before( FunctionalTester $I)
    {

    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
	    $I->loginAsAdmin();
	    $I->amOnPluginsPage();
	    $I->activatePlugin( 'dws-wordpress-framework-bootstrapper-test-plugin' );
		$I->see( 'DWS WordPress Framework Bootstrapper Test Plugin' );

	    \DeepWebSolutions\Framework\dws_wp_framework_get_whitelabel_name();
    }
}
