<?php declare( strict_types=1 );

namespace Tests\Integration;

use Tests\Support\IntegrationTester;
use lucatume\WPBrowser\TestCase\WPTestCase;

class WhitelabelTest extends WPTestCase {
	protected IntegrationTester $tester;

   public function test_whitelabel_name(): void {
	   $this->assertEquals( 'Whitelabel Name', \DeepWebSolutions\Framework\get_whitelabel_author_name() );
   }

   public function test_whitelabel_logo_path(): void {
	   $this->assertEquals( WP_PLUGIN_DIR . '/dws-wp-bootstrapper-test-plugin/bootstrap.php', \DeepWebSolutions\Framework\get_whitelabel_author_logo_path() );
   }

   public function test_whitelabel_support_email(): void {
	   $this->assertEquals( 'whitelabel-support@whitelabel-company.com', \DeepWebSolutions\Framework\get_whitelabel_support_email() );
   }

   public function test_whitelabel_support_url(): void {
	   $this->assertEquals( 'whitelabel-company.com', \DeepWebSolutions\Framework\get_whitelabel_support_url() );
   }

   public function test_whitelabel_upload_subdir(): void {
	   $this->assertEquals( 'temp-dir-name', \DeepWebSolutions\Framework\get_whitelabel_upload_subdir() );
   }
}
