# Phtml

[![Automation](https://github.com/ghostwriter/phtml/actions/workflows/automation.yml/badge.svg)](https://github.com/ghostwriter/phtml/actions/workflows/automation.yml)
[![PHP Version](https://badgen.net/packagist/php/ghostwriter/phtml?color=777BB4)](https://www.php.net/supported-versions)
[![Packagist Downloads](https://badgen.net/packagist/dt/ghostwriter/phtml?color=F28D1A)](https://packagist.org/packages/ghostwriter/phtml)
[![PayPal](https://img.shields.io/badge/paypal-@codepoet-0079C1?logo=paypal&logoColor=002991)](https://paypal.me/codepoet)
[![Sponsors via GitHub](https://img.shields.io/github/sponsors/ghostwriter?label=Sponsor+@ghostwriter/phtml&logo=GitHub+Sponsors)](https://github.com/sponsors/ghostwriter)

A powerful PHP template engine designed to deliver high-performance, extensibility, and security.

> [!WARNING]
>
> This project is not finished yet, work in progress.

## Installation

You can install the package via composer:

``` bash
composer require ghostwriter/phtml
```

### Star ⭐️ this repo if you find it useful

You can also star (🌟) this repo to find it easier later.

## Usage

```php
use Ghostwriter\Phtml\Phtml;

$phtml = Phtml::new('path/to/templates', 'path/to/cache');

$phtml->registerNamespace('html', 'path/to/templates/html');

// File: path/to/templates/html/element/paragraph.phtml
// Content: <p>{{ $message }}</p>

// "html" is the namespace.
// "element" is the directory name inside the namespace.
// "paragraph" is the template filename inside the directory, without the ".phtml" extension.

$html = $phtml->render('html::element.paragraph',['message' => '#BlackLivesMatter']);

echo $html; // <p>#BlackLivesMatter</p>
```

### Advanced Usage
```php
use Ghostwriter\Phtml\Cache\PhtmlCache;
use Ghostwriter\Phtml\Compiler\PhtmlCompiler;
use Ghostwriter\Phtml\Engine\PhtmlEngine;
use Ghostwriter\Phtml\Loader\PhtmlLoader;
use Ghostwriter\Phtml\Renderer\PhtmlRenderer;

$cache = PhtmlCache::new('path/to/cache');
$loader = PhtmlLoader::new('path/to/templates');
$compiler = PhtmlCompiler::new($cache, $loader);
$engine = PhtmlEngine::new($compiler);
$renderer = PhtmlRenderer::new($engine);

$result = $renderer->render(template: 'alert', context: ['message' => '#BlackLivesMatter']);
```

### Credits

- [Nathanael Esayeas](https://github.com/ghostwriter)
- [All Contributors](https://github.com/ghostwriter/phtml/contributors)

### Changelog

Please see [CHANGELOG.md](./CHANGELOG.md) for more information on what has changed recently.

### License

Please see [LICENSE](./LICENSE) for more information on the license that applies to this project.

### Security

Please see [SECURITY.md](./SECURITY.md) for more information on security disclosure process.
