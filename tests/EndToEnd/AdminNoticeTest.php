<?php

namespace Tests\EndToEnd;

use Codeception\Test\Unit;
use Tests\Support\EndToEndTester;

class AdminNoticeTest extends Unit {

    protected EndToEndTester $tester;

    protected function _before() {
		$this->tester->loginAsAdmin();

		$this->tester->amOnPluginsPage();
	    $this->tester->activatePlugin( 'dws-framework-bootstrapper-test-plugin' );
    }

    public function test_admin_notice_output() {
	    require WP_PLUGIN_DIR . '/dws-framework-bootstrapper-test-plugin/bootstrap.php';

	    require codecept_root_dir( 'tests/Support/dws-framework-bootstrapper-test-plugin/bootstrap.php' );
		if ( version_compare( PHP_VERSION, '8.5', '<' ) || version_compare( $GLOBALS['wp_version'], '6.7', '<' ) ) {
			codecept_debug( 'Bootstrapper has NOT been initialized ... checking that the message IS present' );
			$this->tester->see( 'Your environment does not meet all the system requirements listed below' );
		} else {
			codecept_debug( 'Bootstrapper has been initialized ... checking that the message is NOT present' );
			$this->tester->dontSee( 'Your environment does not meet all the system requirements listed below' );
		}

		/*
	    codecept_debug( PHP_VERSION );
		codecept_debug( $GLOBALS['wp_version'] );

		require codecept_root_dir( 'tests/Support/dws-framework-bootstrapper-test-plugin/bootstrap.php' );


		//require __DIR__ . '/../Support/dws-framework-bootstrapper-test-plugin/bootstrap.php';
	    if ( true === \DeepWebSolutions\Framework\is_bootstrapper_initialized() ) {
		    codecept_debug( 'Bootstrapper has been initialized ... checking that the message is NOT present' );
		    $this->tester->dontSee( 'Your environment does not meet all the system requirements listed below' );
	    } else {
		    codecept_debug( 'Bootstrapper has NOT been initialized ... checking that the message IS present' );
		    $this->tester->see( 'Your environment does not meet all the system requirements listed below' );
	    }*/
    }
}
