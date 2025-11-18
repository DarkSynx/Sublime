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
echo sublime(function() {
    return div(
        ['class' => 'card'],
        h1([], "Hello World"),
        p([], "This is generated with Sublime PHP.")
    );
});
```

Résultat :

```html
<div class="card">
  <h1>Hello World</h1>
  <p>This is generated with Sublime PHP.</p>
</div>
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
