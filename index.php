<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use function Sublime\{Sublime, body_, div_, header_, h1_, nav_, a_, main_, p_, img_, footer_, small_, raw_html};

echo Sublime(fn () => body_(data: [
    div_(class: 'container', data: [
        header_(data: [
            h1_('Mon Super Site'),
            nav_(data: [
                a_(href: '/', data: 'Accueil'),
                a_(href: '/about', data: 'À propos'),
                raw_html('<span>漢 6565</span>')
            ])
        ]),
        main_(data: [
            p_('Bienvenue sur mon site'),
            img_(src: 'img/photo.jpg', alt: 'Photo')
        ]),
        footer_(data: [
            p_(small_('© ' . date('Y')))
        ])
    ])
]));
