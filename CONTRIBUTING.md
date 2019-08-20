# Contributing

Thank you for taking the time to help us develop the ClinchPad library!

We do all our work on GitHub. If you'd like to help, you can create a
[free GitHub account here](https://github.com/join).

## Reporting an issue

For bug reports or feature requests, please [create a new issue](https://github.com/thinkshout/clinchpad-api-php/issues).

If reporting a bug, please:

* Let us know what steps we can take to reproduce the bug
* Include any error messages you received

## Submitting changes

The best way to submit a bug fix or improvement is through a [pull request](https://help.github.com/articles/creating-a-pull-request-from-a-fork/).

* [Fork](https://guides.github.com/activities/forking/), then clone the repository:

`git clone git@github.com:YOUR-GITHUB-USERNAME/clinchpad-api-php.git`

* Install the library's dependencies using [Composer](https://getcomposer.org/):

```shell
cd clinchpad-api-php
composer install
```

* If you are adding new functionality, please add a corresponding test.
  See [Testing](#testing) for more information.

* After making your changes, ensure all tests pass.

* Commit and push your changes to your fork of the repository.

* [Submit a pull request](https://github.com/oberonamsterdam/clinchpad-api-php/pulls).

## Testing

This library includes a [PHPUnit](https://phpunit.de/) test suite. Keeping these
tests up to date helps us ensure the library is reliable.

### Running PHPUnit tests

Add Composer's vendor directory to your PATH by adding the following line to
your profile. This is dependent on your system, but on a Linux or Mac OSX system
using Bash, you'll typically find the file at *~/.bash_profile*.

`export PATH="./vendor/bin:$PATH"`

Bash example:

```shell
echo 'export PATH="./vendor/bin:$PATH"' >> ~/.bash_profile
source ~/.bash_profile
```

Then run PHPUnit:

`phpunit`

### Creating new tests

Tests are located in the *tests* directory and are grouped into PHP files named
after the library component they are testing. For example,
*ClinchPadCampaignsTest.php* contains tests for ClinchPad Campaigns.

New tests should contain at least the functionality in this simple test:

```php
public function testGetContacts() {
  $mc = new ClinchPadContacts();
  $mc->getContacts();

  $this->assertEquals('GET', $mc->getClient()->method);
  $this->assertEquals($mc->getEndpoint() . '/contacts', $mc->getClient()->uri);
}
```

This test checks the request type and request URI are both correct.

More advanced examples can be found in the *tests* directory.

## Additional resources

* [ClinchPad API documentation](https://clinchpad.com/api/docs/)
* [Oberon](https://www.oberon.nl/), the library maintainer.

## Want to help build this and other open source projects?

We're hiring software engineers! Check out our [careers page](https://www.oberon.nl/vacatures/).