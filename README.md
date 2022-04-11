# Overview

[![Latest Version on Packagist](https://img.shields.io/packagist/v/arcanely/editor.svg?style=flat-square)](https://packagist.org/packages/arcanely/editor)
[![Total Downloads](https://img.shields.io/packagist/dt/arcanely/editor.svg?style=flat-square)](https://packagist.org/packages/arcanely/editor)
![GitHub Actions](https://github.com/arcanely/editor/actions/workflows/main.yml/badge.svg)

A Laravel Blade Component Library for the <a href="https://editorjs.io/" target="_blank">Editor.js</a> Block Editor

Note: This library does nothing to validate or purify user input. This must be done in your application.

## Installation

You can install the package via composer:

```bash
composer require arcanely/editor
```

You may override all default files like this
```bash
php artisan vendor:publish --provider="Arcanely\Editor\EditorServiceProvider"
```

or pass a tag for `config`, `public`, `src-assets`, `views`
```bash
php artisan vendor:publish --provider="Arcanely\Editor\EditorServiceProvider"  --tag=views
```

You can automate the asset publishing on updates by adding this to the composer.json scripts section.
```json
"scripts": {
    "post-update-cmd": [
        "@php artisan vendor:publish --provider=\"Arcanely\\Editor\\EditorServiceProvider\""
    ]
}
```

## Usage

```php
// Usage description here
// Until docs are written, look at the welcome view
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email nickolas.j.adams@gmail.com instead of using the issue tracker.

## Credits

-   [Nick Adams](https://github.com/arcanely)
-   [All Contributors](../../contributors)