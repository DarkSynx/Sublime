# Sublime

# 🌟 Sublime PHP — Functional & Immutable HTML Builder

**Sublime PHP** est une mini-librairie légère et élégante permettant de générer du HTML en PHP de manière **fonctionnelle**, **immutable** et **expressive**, sans templates, sans dépendances, uniquement du PHP moderne.

Elle offre une syntaxe claire, inspirée de React/JSX, permettant de construire des éléments HTML comme des objets immuables, tout en conservant la simplicité du langage.

---

## 🚀 Fonctionnalités principales

* **API 100% immuable** : chaque modification retourne une nouvelle instance
* **Construction HTML déclarative**
* **Gestion automatique des children** : chaînes, nombres, tableaux, callbacks, éléments imbriqués
* **Normalisation intelligente** des structures
* **Échappement sécurisé du contenu**
* **Fonctions utilitaires simples à utiliser**
* **Compatible PHP moderne (>= 8.1)**
* **Aucune dépendance externe**

---

## 🔧 Exemple d’utilisation

```php
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
```

Résultat :

```html
<body>
   <link rel="stylesheet" href="style.css">
   <div class="container">
      <header>
         <h1>Mon Super Site</h1>
         <nav>
            <a href="/">Accueil</a><a href="/about">À propos</a><ruby> 漢 6565</ruby>
            <div class="article">
               <z>test de texte</z>
            </div>
         </nav>
      </header>
      <main>
         <p>Bienvenue sur mon site</p>
         <img src="img/photo.jpg" alt="Photo">
      </main>
      <footer>
         <p><small>© 2024</small></p>
      </footer>
   </div>
</body>

```

---

## 🧩 Pourquoi Sublime PHP ?

* Idéal pour générer du HTML côté serveur sans utiliser de moteur de template
* Parfait pour des projets où vous voulez **garder PHP pur**
* Offre une approche moderne : **immutabilité**, **purification du DOM**, **callbacks**
* Léger, compréhensible, extensible

---

## 📦 Installation

Ajouter simplement le fichier dans votre projet et incluez-le :

```php
require_once 'sublime.php';
```

Aucune configuration nécessaire.

---

## 📝 Compatibilité

* PHP 8.1+
* Fonctionne sur tout type de projet : API, back-office, micro-framework, CLI, etc.

---

## 📚 Licence

MIT — Libre d’utilisation, même dans des projets commerciaux.
