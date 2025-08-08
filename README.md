# Struktal-Composer-Reader

This is a PHP library that reads metadata from the project's `composer.json` file.

# Installation

To install this library, include it in your project using Composer:

```bash
composer require struktal/struktal-composer-reader
```

# Usage

Before you can use this library, you need to customize a few parameters.
You can do this in the startup of your application:

```php
\struktal\ComposerReader\ComposerReader::setProjectDirectory("path/to/your/project");
```

Then, you can use the library's features in your code.

## Read information from `composer.json`

To read information from the `composer.json` file, you can use the `ComposerReader` class:

```php
$composerReader = new \struktal\ComposerReader\ComposerReader();
$name = $composerReader->get("name");
$phpVersion = $composerReader->get("require", "php");
```

# License

This software is licensed under the MIT license.
See the [LICENSE](LICENSE) file for more information.
