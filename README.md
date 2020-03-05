# gh640/phpunit-tap

[![Build Status](https://travis-ci.org/gh640/phpunit-tap.svg?branch=master)](https://travis-ci.org/gh640/phpunit-tap)

A simple Composer package which provides a TAP result printer for [PHPUnit](https://github.com/sebastianbergmann/phpunit).

![capture](https://raw.githubusercontent.com/gh640/phpunit-tap/master/assets/capture.gif)

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
- Other PHPUnit printers: You might be interested in the other PHPUnit printers.
    - <a href="https://packagist.org/packages/whatthejeff/nyancat-phpunit-resultprinter">whatthejeff/nyancat-phpunit-resultprinter - Packagist</a>
    - <a href="https://packagist.org/packages/memio/pretty-printer">memio/pretty-printer - Packagist</a>
    - <a href="https://packagist.org/packages/thru.io/json-pretty-printer">thru.io/json-pretty-printer - Packagist</a>
    - <a href="https://packagist.org/packages/kujira/phpunit-printer">kujira/phpunit-printer - Packagist</a>
    - <a href="https://packagist.org/packages/scriptfusion/phpunit-immediate-exception-printer">scriptfusion/phpunit-immediate-exception-printer - Packagist</a>
    - <a href="https://packagist.org/packages/diablomedia/phpunit-pretty-printer">diablomedia/phpunit-pretty-printer - Packagist</a>
    - <a href="https://packagist.org/packages/zf2timo/phpunit-pretty-result-printer">zf2timo/phpunit-pretty-result-printer - Packagist</a>


## License

Licensed under the MIT license.
