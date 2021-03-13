# How to test the package

## Setup

1) Create a WordPress test instance. You can use your preferred method of setting up development environments, e.g. VVV, Docker, Local by Flywheel etc.
1) Create a separate database for acceptance+functional tests. For example, for `DB_USER` 'wp' and `DB_HOST` 'localhost':

   * mysql -u root -p -e "CRATE DATABASE if not exists bootstrapper_tests"
   * mysql -u root -p -e "GRANT ALL PRIVILEGES ON bootstrapper_tests.* TO 'wp'@'localhost';"
   
1) Modify the `wp-config.php` file to use the appropriate database for acceptance and functional tests: https://wpbrowser.wptestkit.dev/tutorials/vvv-setup#using-the-tests-database-in-acceptance-and-functional-tests
1) Copy the `_support/plugins/dws-wp-bootstrapper-test-plugin` folder to your instance's `wp-content/plugins` folder and install dependencies with `composer install --ignore-platform-reqs`.
1) Copy the `.dist.env` file to `wp-content/plugins/dws-wp-bootstrapper-test-plugin/.env.testing` and fill in your local environment variables.
1) Copy the `codeception.dist.yml` file to `wp-content/plugins/dws-wp-bootstrapper-test-plugin/codeception.dist.yml` and adjust the `paths` accordingly.


## Running Tests

TODO: finish explaining the prerequisited for running each of the tests.

#### Unit tests

From the root directory, run `./vendor/bin/codeception run unit`.

#### Integration tests

From the root directory, run `./vendor/bin/codeception run integration`.

#### Functional tests

From the root directory, run `./vendor/bin/codeception run functional`.

#### Acceptance tests

From the root directory, run `./vendor/bin/codeception run acceptance`.