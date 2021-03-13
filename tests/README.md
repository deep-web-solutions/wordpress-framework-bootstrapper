# How to test the package

## Setup

1) Install dependencies with `composer install`.
2) Copy the `.dist.env` file to `.env.testing` and fill in your local environment variables. **Note:** make sure you truly use two separate databases for acceptance+functional and integration tests.
3) Copy the `codeception.local.yml` file to `codeception.yml` and add any custom Codeception configurations.

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