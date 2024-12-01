<?php declare( strict_types=1 );


use lucatume\WPBrowser\TestCase\WPTestCase;

class WhitelabelTest extends WPTestCase {
   public function test_whitelabel_name(): void {
	   	  $this->assertEquals( 'Whitelabel Name', \DeepWebSolutions\Framework\get_whitelabel_author_name() );
   }
}
