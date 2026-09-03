<div align="center">

# 🛡️ Protection Anti-Plagiat

**Protégez votre site web contre le scraping, le plagiat et la revente de contenu nulled.**

[![Version](https://img.shields.io/badge/version-1.8.0-blue.svg)](https://github.com/NuggaN85/Protection-Anti-Plagiat/archive/master.zip)
[![License: MIT](https://img.shields.io/github/license/NuggaN85/Protection-Anti-Plagiat)](https://github.com/NuggaN85/Protection-Anti-Plagiat)
[![Issues](https://img.shields.io/github/issues/NuggaN85/Protection-Anti-Plagiat)](https://github.com/NuggaN85/Protection-Anti-Plagiat/issues)
[![Forks](https://img.shields.io/github/forks/NuggaN85/Protection-Anti-Plagiat)](https://github.com/NuggaN85/Protection-Anti-Plagiat/network)
[![Stars](https://img.shields.io/github/stars/NuggaN85/Protection-Anti-Plagiat)](https://github.com/NuggaN85/Protection-Anti-Plagiat/stargazers)
[![Codacy](https://api.codacy.com/project/badge/Grade/3319a02c269049cfa8720f3b7c408046)](https://app.codacy.com/gh/NuggaN85/Protection-Anti-Plagiat/commits?bid=14837328)
[![Donate](https://img.shields.io/badge/paypal-donate-yellow.svg?style=flat)](https://www.paypal.me/nuggan85)

<a href="https://www.dmca.com/Protection/Status.aspx?ID=e1725bf3-1ec4-44bb-b65e-0a20fd4919fa&refurl=https://github.com/NuggaN85/Protection-Anti-Plagiat" title="DMCA.com Protection Status">
  <img src="https://images.dmca.com/Badges/dmca_protected_sml_120d.png?ID=e1725bf3-1ec4-44bb-b65e-0a20fd4919fa" alt="DMCA.com Protection Status" />
</a>

</div>

---

## 📋 Table des matières

- [Présentation](#-présentation)
- [Fonctionnalités](#-fonctionnalités)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Sécurité .htaccess](#-sécurité-htaccess)
- [Contribuer](#-contribuer)
- [Communauté](#-communauté)

---

## 📖 Présentation

**Protection Anti-Plagiat** est un script PHP léger conçu pour bloquer les aspirateurs de sites web (scrapers) avant qu'ils ne puissent copier votre contenu. Il cible notamment les outils bien connus comme `HTTrack`, `WebCopier`, `Black Widow` et plus de **1 800 agents malveillants** référencés.

La solution repose sur deux mécanismes complémentaires :

- **Blocage des agents** — comparaison de l'`User-Agent` de chaque visiteur contre une liste maintenue de bots et scrapers connus.
- **Journal d'activité** — chaque tentative de scraping est enregistrée dans un fichier `.cnx`, inaccessible aux navigateurs web, pour une traçabilité complète.

---

## ✨ Fonctionnalités

| Fonctionnalité | Détail |
|---|---|
| 🤖 Blocage de bots | +1 800 agents malveillants détectés |
| 📝 Journalisation | IP, port, user-agent, date/heure enregistrés |
| 🔒 Fichier log protégé | Format `.cnx` non interprété par les navigateurs |
| ⚡ Léger | Aucune dépendance externe, PHP pur |
| 🌐 Compatible | PHP 8.0+ |

---

## 📦 Installation

1. **Téléchargez** le dossier `papprotect` et placez-le à la **racine de votre site** (`public_html`, `www`, etc.) :

   ```
   votre-site/
   ├── public_html/
   │   ├── papprotect/          ← ici
   │   │   ├── papprotect.php
   │   │   ├── bad_bots.php
   │   │   └── papprotect-log.cnx  (créé automatiquement)
   │   └── index.php
   ```

2. **Installation automatique** (optionnel) — uploadez `auto_install.php` à la racine, ouvrez-le dans votre navigateur, puis supprimez-le immédiatement après.

> ⚠️ **Supprimez `auto_install.php` du serveur après installation.** Ce fichier ne doit jamais rester accessible en production.

---

## ⚙️ Configuration

Incluez la protection au début de chaque page à protéger. La méthode recommandée est de le faire **une seule fois dans votre fichier de configuration global** (`config.php`, `bootstrap.php`, etc.).

### Fichiers PHP

Ajoutez cette ligne juste après la balise d'ouverture `<?php` :

```php
<?php
$base_dir = __DIR__ . '/';
include_once($base_dir . 'papprotect/papprotect.php');
```

### Fichiers HTML (avec PHP activé)

Ajoutez ce bloc **avant** la balise `</head>` :

```html
<?php
$base_dir = __DIR__ . '/';
include_once($base_dir . 'papprotect/papprotect.php');
?>
```

### Via `data.php` (accès direct à la liste)

Si vous avez besoin d'accéder au tableau `$bad_bots` dans votre propre logique :

```php
<?php
require_once 'data.php';
// $bad_bots est désormais disponible
```

---

## 🔒 Sécurité `.htaccess`

Ajoutez les règles suivantes à votre fichier `.htaccess` pour empêcher tout accès direct aux fichiers sensibles du projet :

```apache
# Protection Anti-Plagiat — Bloquer les fichiers sensibles
<Files ".htaccess">
    Require all denied
</Files>

<FilesMatch "(^\.|\.htaccess$|\.cnx$)">
    Require all denied
</FilesMatch>
```

Cela empêche les visiteurs d'accéder directement à `.htaccess` et au journal de log `papprotect-log.cnx`.

---

## 🛡️ Licence

Ce script est fourni sous licence **MIT** – vous pouvez l’utiliser, le modifier et le redistribuer librement.

---

## 🤝 Contributions

Les pull requests et suggestions d’amélioration sont les bienvenues.  
Pour signaler un problème, ouvrez une issue sur le dépôt.
