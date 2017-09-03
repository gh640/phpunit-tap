# gh640/phpunit-tap

A simple Composer package which provides a TAP result printer for PHPUnit.


# Usage

Install the package with Composer.

    $ composer require --dev gh640/phpunit-tap

Use the TAP result printer with your PHPUnit tests with the `--printer` option.

    $ phpunit --printer gh640\PhpunitTap\TapResultPrinter [your test file]

Or, you can omit the option `--printer` by adding the option into your `phpunit.xml`.

```xml
<?xml version="1.0" encoding="UTF-8"?>

<phpunit
  printerClass="gh640\PhpunitTap\TapResultPrinter"
>
</phpunit>
```


# License

Licensed under the MIT license.
