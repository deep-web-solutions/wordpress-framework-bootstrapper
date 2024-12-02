# Setting up a dev environment using Studio by WordPress.com on MacOS

1) Make sure MariaDB is running on your machine.
	* Follow the instructions at https://mariadb.com/kb/en/installing-mariadb-on-macos-using-homebrew/
	* Test by opening a terminal and running `mariadb` (no arguments)

1) Create a new database for the plugin:
	* mariadb -e "CREATE DATABASE IF NOT EXISTS dws_framework_bootstrapper"
	* mariadb -e "CREATE USER IF NOT EXISTS 'wpcom_studio'@'localhost' IDENTIFIED BY '<your secret password>'"
	* mariadb -e "GRANT ALL PRIVILEGES ON dws_framework_bootstrapper.* TO 'wpcom_studio'@'localhost'"

1) Create a new database for the E2E tests:
	* mariadb -e "CREATE DATABASE IF NOT EXISTS dws_framework_bootstrapper_e2e"
	* mariadb -e "GRANT ALL PRIVILEGES ON dws_framework_bootstrapper_e2e.* TO 'wpcom_studio'@'localhost'"

1) Create a new site in *Studio by WordPress.com* and configure it to use the database you created in the previous step.
	* Suggested site name: `DWS Framework Bootstrapper`
	* https://developer.wordpress.com/docs/developer-tools/studio/#use-studio-with-mysql-server
	* Suggested `wp-config.php` constants are:
		* `DB_NAME`: `dws_framework_bootstrapper`
		* `DB_USER`: `wpcom_studio`
		* `DB_PASSWORD`: `<your secret password>`
		* `DB_HOST`: `127.0.0.1`
		* `DB_CHARSET`: `utf8mb4`
		* `DB_COLLATE`: `utf8mb4_unicode_520_ci`
		* `WP_DEBUG`: true

1) Finish configuring the site using the username and password provided by Studio by WordPress.com.
	* Use `admin@example.com` as the site admin email.

1) Export the database to create your E2E tests fixture.
	* `cd <path to the plugin>`
	* `mysqldump -u wpcom_studio -p dws_framework_bootstrapper > ./tests/Support/Data/dump.sql`

1) Modify your `wp-config.php` file to conditionally use the test database when running the E2E tests.

	```php
	if ( isset( $_COOKIE['TEST_REQUEST'] ) ) {
		define( 'DB_NAME', 'dws_wp_framework_bootstrapper_e2e' );
	} else {
		define( 'DB_NAME', 'dws_wp_framework_bootstrapper' );
	}
	```

1) Install selenium-server and chromedriver to run the E2E tests.
	* https://formulae.brew.sh/formula/selenium-server
	* https://formulae.brew.sh/cask/chromedriver
	* Test that it's working by running `selenium-server info` and `chromedriver --version`, respectively.
	* If you encounter the error `Apple could not verify “chromedriver” is free of malware that may harm your Mac or compromise your privacy.`:
		* Run `which chromedriver` to get the path to the binary.
		* Run `xattr -d com.apple.quarantine <path to chromedriver>` to remove the quarantine attribute.
	* Your `chromedriver` version should match the version of your Chrome browser.

1) Start the selenium server:
   * In a new terminal tab, run `selenium-server standalone --port 4444`
   * If you use a different port, update the `CHROMEDRIVER_PORT` variable inside the `tests/.env` file accordingly.

1) Copy the `tests/Supports/dws-framework-bootstrapper-test-plugin` to the `wp-content/plugins` directory of your site.
	* `cp -r tests/Supports/dws-framework-bootstrapper-test-plugin <path to the site>/wp-content/plugins`
    * `cd <path to the site>/wp-content/plugins/dws-framework-bootstrapper-test-plugin && composer update`

1) Activate the plugin in the site's admin dashboard. Every time you make a change to the bootstrapper component, make sure to sync the changes to that plugin.
 	* For example, by using PhpStorm's local deployment feature.

1) Copy the `codeception.local.yml` file to `codeception.yml` (ignored by git):
	* `cp codeception.local.yml codeception.yml`

1) Test that everything is working by running the automated tests:
	* `composer run-script test`
