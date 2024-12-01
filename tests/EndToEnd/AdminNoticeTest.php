<?php

namespace Tests\EndToEnd;

use Codeception\Test\Unit;
use Tests\Support\EndToEndTester;

class AdminNoticeTest extends Unit {

    protected EndToEndTester $tester;

    protected function _before() {
    }

    // tests
    public function testSomeFeature() {
	    $this->tester->loginAsAdmin();
	    $this->tester->amOnAdminPage( '/' );

	    if ( true === \DeepWebSolutions\Framework\is_bootstrapper_initialized() ) {
		    codecept_debug( 'Bootstrapper has been initialized ... checking that the message is NOT present' );
		    $this->tester->dontSee( 'Your environment does not meet all the system requirements listed below' );
	    } else {
		    codecept_debug( 'Bootstrapper has NOT been initialized ... checking that the message IS present' );
		    $this->tester->see( 'Your environment does not meet all the system requirements listed below' );
	    }
    }
}
