# gh640/phpunit-tap

A simple Composer package which provides a TAP result printer for [PHPUnit](https://github.com/sebastianbergmann/phpunit).

![capture](https://raw.githubusercontent.com/gh640/phpunit-tap/master/assets/capture.gif)

Most of the code is blatantly copied from the official [PHPUnit TAP logger](https://github.com/sebastianbergmann/phpunit/blob/5.7/src/Util/Log/TAP.php).


## Usage

Install the package with Composer.

    $ composer require --dev gh640/phpunit-tap

Specify the TAP result printer with the `--printer` option when running `phpunit`. The printer's FQCN is `gh640\PhpunitTap\TapResultPrinter`.

    $ phpunit --printer gh640\PhpunitTap\TapResultPrinter [your test file]

You can pipe the output to your favorite TAP reporter/formatter. See also <a href="https://github.com/sindresorhus/awesome-tap">sindresorhus/awesome-tap | GitHub</a>.

    $ phpunit --printer gh640\PhpunitTap\TapResultPrinter [your test file] | tap-dot
    $ phpunit --printer gh640\PhpunitTap\TapResultPrinter [your test file] | tap-nyan
    $ phpunit --printer gh640\PhpunitTap\TapResultPrinter [your test file] | tap-notify

Or, you can omit the option `--printer` by adding the option into your `phpunit.xml`.

```xml
<?xml version="1.0" encoding="UTF-8"?>

<phpunit
  printerClass="gh640\PhpunitTap\TapResultPrinter"
>
</phpunit>
```


## Dependencies

This package depends on the following packages.

- `phpunit/phpunit`
- `symfony/yaml`

For the detailed dependencies, please have a look at the Packagist page.

- <a href="https://packagist.org/packages/gh640/phpunit-tap">gh640/phpunit-tap - Packagist</a>


## Issues

If you find an issue, please file it in the issue queue.

<a href="/gh640/phpunit-tap/issues">Issues · gh640/phpunit-tap · GitHub</a>


## Reference

- PHPUnit
    - <a href="https://phpunit.de/">PHPUnit – The PHP Testing Framework</a>
- TAP (Test Anything Protocol)
    - <a href="https://testanything.org/">Test Anything Protocol</a>
    - <a href="https://en.wikipedia.org/wiki/Test_Anything_Protocol">Test Anything Protocol - Wikipedia</a>


## License

Licensed under the MIT license.
