# Sublime PHP

Functional & immutable HTML builder for PHP 8.1+.

[![CI](https://github.com/DarkSynx/Sublime/actions/workflows/ci.yml/badge.svg)](https://github.com/DarkSynx/Sublime/actions/workflows/ci.yml)
![Packagist version](https://img.shields.io/badge/packagist-coming%20soon-lightgrey)
![License](https://img.shields.io/github/license/DarkSynx/Sublime)

## Installation

Install the library via [Composer](https://getcomposer.org/):

```bash
composer require darksynx/sublime
```

Once installed, everything is auto-loaded through Composer:

```php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use function Sublime\{Sublime, body_, div_, p_};

echo Sublime(fn () => body_(data: [
    div_(class: 'app', data: [
        p_('Hello, Sublime!')
    ])
]));
```

## Basic usage

Sublime exposes a `Sublime(fn () => ...)` entry point. Inside the callback you compose HTML using the underscore tag helpers (`body_()`, `div_()`, `p_()`, ...). All children are normalized, arrays are flattened, and scalar values are escaped by default.

```php
use function Sublime\{Sublime, body_, div_, h1_, p_};

echo Sublime(fn () => body_(data: [
    div_(class: 'container', data: [
        h1_('Welcome 👋'),
        p_('Build HTML with pure PHP, no templates required.'),
    ]),
]));
```

Output:

```html
<body>
    <div class="container">
        <h1>Welcome 👋</h1>
        <p>Build HTML with pure PHP, no templates required.</p>
    </div>
</body>
```

### "One shot" include (no `use function` imports)

If you are prototyping or want the smallest possible bootstrap file, you can
simply include the generated helper file and call `Sublime()` directly without
adding `use function ...` statements. This is convenient when sharing
copy/pasteable examples with newcomers.

```php
<?php

namespace Sublime;

include __DIR__ . '/sublime.php';

$user = 'admin';

echo Sublime(fn () =>
    body_([
        link_(rel: 'stylesheet', href: 'style.css'),
        div_(class: 'container', data: [
            header_([
                h1_('Mon Super Site'),
                nav_([
                    a_(href: '/', data: 'Accueil'),
                    a_(href: '/about', data: 'À propos'),
                    $user !== 'admin' ? ruby_(' 漢 6565') : ' => admin',
                    div_(
                        class: 'article',
                        data: raw_html('<z>test de texte</z>')
                    ),
                ]),
            ]),
        ]),
    ])
);
```

Composer remains the recommended installation method, but the helper file is
100% standalone, so you can tailor the ergonomics to your preferred “one shot”
style.

## Factory-assisted usage (no helper imports)

If you prefer importing only the main `Sublime()` function, declare a parameter in
the callback. Sublime will automatically inject a `TagFactory` instance that
exposes every helper dynamically:

```php
use function Sublime\Sublime;

echo Sublime(fn (\Sublime\TagFactory $tags) => $tags->body(
    data: [
        $tags->div(
            class: 'container',
            data: [
                $tags->p('Factory-powered rendering!'),
            ],
        ),
    ],
));
```

The factory also exposes `$tags->tag('my-element', ...)`, `$tags->raw('<b>..</b>')`,
and `$tags->fragment(...)` helpers for custom elements and raw output.

## Components and composition

Everything is just PHP, so you can create reusable components by returning `HtmlElement` instances from plain functions.

```php
use Sublime\HtmlElement;
use function Sublime\{div_, nav_, a_, main_, footer_, small_, Sublime, body_};

function navbar(): HtmlElement
{
    return nav_(data: [
        a_(href: '/', data: 'Home'),
        a_(href: '/docs', data: 'Docs'),
        a_(href: '/github', data: 'GitHub'),
    ]);
}

function layout(HtmlElement $content): HtmlElement
{
    return body_(data: [
        navbar(),
        main_(data: $content),
        footer_(data: small_('© ' . date('Y')))
    ]);
}

echo Sublime(fn () => layout(div_('Hello from a component!')));
```

## Escaping and `RawHtml`

* Every string child and attribute is HTML-escaped automatically (`&`, `<`, `>`, quotes, etc.).
* Nested arrays, `null`, and `false` values are removed when normalizing children.
* When you really need to inject trusted markup, wrap it in `raw_html('<span>Trusted</span>')`. **Do not** use `RawHtml` for user-generated content, otherwise you may introduce XSS vulnerabilities.

```php
use function Sublime\{div_, raw_html};

div_(data: [
    'Safe: ',
    raw_html('<strong>Trusted markup</strong>'),
]);
```

## Examples

Run the bundled examples with:

```bash
php -S localhost:8000 -t examples
```

* `examples/basic.php` – minimal “Hello world” rendering.
* `examples/components.php` – layout + reusable components.
* `examples/conditions.php` – conditional rendering in callbacks.

## Limitations & roadmap

* No template inheritance – compose everything with PHP functions.
* No client-side hydration helpers yet.
* Limited to standard HTML tag helpers (custom elements are supported by calling `_tag('my-element', ...)`).
* Future roadmap: better documentation, Packagist release, and extra developer tooling.

## License

Released under the [MIT License](LICENSE).
