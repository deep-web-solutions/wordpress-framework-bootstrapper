<?php declare( strict_types = 1 );

namespace DeepWebSolutions\Framework\Bootstrapper\Tests\Acceptance;

use AcceptanceTester;
use Codeception\TestCase\WPTestCase;

/**
 * Acceptance test for ensuring the admin notice is shown every time it should be.
 *
 * @since   1.1.0
 * @version 1.1.2
 * @author  Antonius Hegyes <a.hegyes@deep-web-solutions.com>
 * @package DeepWebSolutions\WP-Framework\Bootstrapper\Tests\Acceptance
 */
class AdminNoticeTest extends WPTestCase {
	// region FIELDS AND CONSTANTS

	/**
	 * Instance of the default WP actor.
	 *
	 * @since   1.1.0
	 * @version 1.1.0
	 *
	 * @access  protected
	 * @var     AcceptanceTester
	 */
	protected $tester;

	// endregion

	// region TESTS

	/**
	 * Checks that the admin notice is present if initialization failed and that it's NOT present otherwise.
	 *
	 * @since   1.1.0
	 * @version 1.1.0
	 */
	public function test_it_works() {
		$this->tester->loginAsAdmin();
		$this->tester->amOnAdminPage( '/' );

		if ( true === \DeepWebSolutions\Framework\dws_wp_framework_get_bootstrapper_init_status() ) {
			codecept_debug( 'Bootstrapper has been initialized ... checking that the message is NOT present' );
			$this->tester->dontSee( 'Your environment doesn\'t meet all of the system requirements listed below' );
		} else {
			codecept_debug( 'Bootstrapper has NOT been initialized ... checking that the message IS present' );
			$this->tester->see( 'Your environment doesn\'t meet all of the system requirements listed below', '.dws-requirements-error' );
		}
	}

	// endregion
}
