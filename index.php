<?php


namespace Sublime;
include "sublime.php";
// Exemple d'utilisation (identique à votre code)
echo Sublime(fn() =>
    body_(
        data: [
            link_(rel: 'stylesheet', href: 'style.css'),
            div_(class: 'container', data: [
                header_(data: [
                    h1_('Mon Super Site'),
                    nav_(data: [
                        a_(href: '/', data: 'Accueil'),
                        a_(href: '/about', data: 'À propos'),
                        ruby_(' 漢 6565'),
						div_(
							class: 'article',
							data: raw_html('<z>test de texte</z>')
						)
                    ])
                ]),
                main_(data: [
                    p_("Bienvenue sur mon site"),
                    img_(src: 'img/photo.jpg', alt: 'Photo')
                ]),
                footer_(data: [
                    p_(small_('© 2024'))
                ])
            ])
        ]
    )
);