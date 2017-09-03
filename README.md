# gh640/phpunit-tap

A simple Composer package which provides a TAP result printer for [PHPUnit](https://github.com/sebastianbergmann/phpunit).

![capture](https://raw.githubusercontent.com/gh640/phpunit-tap/master/assets/capture.gif)

Most of the code is blatantly copied from the official [PHPUnit TAP logger](https://github.com/sebastianbergmann/phpunit/blob/5.7/src/Util/Log/TAP.php).


# Usage

Install the package with Composer.

    $ composer require --dev gh640/phpunit-tap

Use the TAP result printer with your PHPUnit tests with the `--printer` option.

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


# License

Licensed under the MIT license.
