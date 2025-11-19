<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use function Sublime\{Sublime, body_, div_, h1_, p_};

echo Sublime(fn () => body_(data: [
    div_(class: 'stack', data: [
        h1_('Sublime'),
        p_('Functional & immutable HTML builder for PHP.')
    ])
]));
