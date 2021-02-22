
# Contributing to Craftgate PHP Client
As an open-source project, anyone can contribute to the development of `craftgate-php-client`. If you decide to do so, please be aware of the guidelines outlined below.

`craftgate-php-client` is written in PHP, in order to contribute to the project, some familiarity with PHP knowledge is required.

## Prerequisites
This project uses [phpunit](https://phpunit.de/) as its test runner. Required minimum php version is 5.3 and current build tool is composer.

## Package Structure
The project has a straightforward package structure; the source files are located under the [src/](src), sample integrations are located under [samples](samples), and tests are located under [unit-tests](unit-tests).

As outlined in the [README](./README.md), the bulk of the project is split into the following categories:

- Adapters: Located under the [src/Adapter](src/Adapter) package, these are classes that are responsible for managing a certain domain
- Enumerations and Domain Objects: Located under [src/Model](src/Model), these are enumerations, constants and domain object models that can be used by request and response.
- Util Classes: Located under [src/Util](src/Util), these are utility classes to be used in core module.

## Tests and Coverage
As a payment systems client, it's important to have tests covering critical parts. In addition to tests that test crucial parts of the libraries and utilities, all samples are provided as php runnable.
It is strongly advised for all contributors to run all samples against the changes introduced in the pull request. If there are no corresponding tests against the changes introduced, owner of the pull request is responsible for adding any relevant tests or samples.