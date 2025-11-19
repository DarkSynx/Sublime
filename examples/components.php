<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Sublime\HtmlElement;
use function Sublime\{Sublime, body_, nav_, a_, main_, section_, h2_, p_, footer_, small_};

function navbar(): HtmlElement
{
    return nav_(class: 'navbar', data: [
        a_(href: '/', data: 'Home'),
        a_(href: '/docs', data: 'Docs'),
        a_(href: '/github', data: 'GitHub')
    ]);
}

function card(string $title, string $body): HtmlElement
{
    return section_(class: 'card', data: [
        h2_($title),
        p_($body)
    ]);
}

function layout(HtmlElement ...$children): HtmlElement
{
    return body_(class: 'layout', data: [
        navbar(),
        main_(data: $children),
        footer_(data: small_('Made with Sublime'))
    ]);
}

echo Sublime(fn () => layout(
    card('Components', 'Create composable PHP functions.'),
    card('No templates', 'Ship HTML with pure PHP.'),
));
