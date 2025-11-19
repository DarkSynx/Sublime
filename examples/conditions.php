<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use function Sublime\{Sublime, body_, div_, h1_, p_, ul_, li_};

$user = 'guest';

$notifications = ['New feature shipped', 'Docs updated'];

echo Sublime(fn () => body_(data: [
    div_(class: 'page', data: [
        h1_($user === 'admin' ? 'Welcome back, admin' : 'Welcome back'),
        $notifications !== []
            ? ul_(data: array_map(fn (string $note) => li_($note), $notifications))
            : p_('Nothing new today.')
    ])
]));
