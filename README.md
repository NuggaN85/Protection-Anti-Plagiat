refait moi au propre ceci pour mettre sur GitHub 

## 🛡️ Protection Anti Plagiat - béta 1.8.0 🛡️

```
 * Dev: NuggaN85
 * Github: NuggaN85
 * Twitter: @NuggaN85
 * Copyright © 2015 - 2023 All rights reserved.
 * MIT Licensed
```

<div style="text-align:center"><img src ="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.fidelizarte.pt%2Fblog%2Fwp-content%2Fuploads%2F2019%2F09%2F1_1-1024x561.png&f=1&nofb=1&ipt=df1e87f6a3b8113e33f15c4caaa78c0c30d8160ea2c93d09ca1bd5fee5c866a7&ipo=images" /></div>

## <strong>🆕 Présentation</strong> 

Ce script vous permettra de protéger votre site web contre les attaques d'aspirateurs de site web, afin d'éviter le plagiat et la vente de votre contenu en tant que `NULLED`. Les aspirateurs, comme le logiciel le plus connu `HTTRACK`, seront automatiquement bannis grâce à notre système de blocage.

Notre solution de sécurité comprend deux éléments : un encodage automatique de votre site web dans un fichier `.CNX` qui n'est pas reconnu par les navigateurs web, ainsi qu'un système de blocage des aspirateurs. Ces mesures garantiront que votre site web est protégé contre les tentatives de copie de contenu.

N'hésitez pas à nous contacter si vous avez des questions ou si vous souhaitez en savoir plus sur notre solution de protection de site web.

--------------------------------------------------------------------------------------------------------------------------------------

## <strong>🆕 Instalation</strong> 

Pour protéger votre site web, veuillez placer le dossier `papprotect` à la racine de votre site, par exemple dans le dossier `public_html` ou `www`. Une fois installé, un fichier supplémentaire nommé `papprotect-log.cnx` sera automatiquement inclus dans le dossier `papprotect`. Ce fichier enregistrera toutes les tentatives de fraudeurs qui tenteront d'aspirer votre site web.

## <strong>🆕 Setup</strong> 

To protect your website, please place the `papprotect` folder in the root of your website, for example in the `public_html` or `www` folder. Once installed, an additional file named `papprotect-log.cnx` will automatically be included in the `papprotect` folder. This file will log all attempts by fraudsters to steal your website.

--------------------------------------------------------------------------------------------------------------------------------------

## <strong>⚠️ Important</strong>

Afin d'installer correctement la protection de votre site web, veuillez suivre les étapes suivantes :

<strong>⚠️</strong>
Pour les fichiers en PHP, incluez la ligne `include_once($base_dir. 'papprotect/papprotect.php');` juste après la balise `<?php` dans les pages que vous souhaitez protéger. Cette étape est idéalement réalisée dans le fichier "config.php" de votre site web.

<strong>⚠️</strong>
Pour les fichiers en HTML, insérez le code `<?php include_once($base_dir. 'papprotect/papprotect.php'); ?>` avant la balise `</head>` dans les pages que vous souhaitez protéger.

Ces étapes sont cruciales pour assurer que la protection de votre site web est active et fonctionnelle. N'hésitez pas à nous contacter si vous rencontrez des problèmes lors de l'installation de la protection de votre site web.

--------------------------------------------------------------------------------------------------------------------------------------

## <strong>🔒 Sécurité</strong>
Pour protéger certains fichiers de votre site web tels que `.htaccess` et `papprotect-log.cnx`, vous pouvez ajouter le code suivant à votre fichier `.htaccess` :

```
## PROTECT FILES
# Limiter l'accès au fichier .htaccess lui-même
<Files ".htaccess">
    Require all denied
</Files>

# Bloquer l'accès à certains fichiers sensibles
<FilesMatch "(^\.|\.htaccess$|^\.cnx$)">
    Require all denied
</FilesMatch>
## PROTECT FILES
```

Ce code permettra de restreindre l'accès à ces fichiers en empêchant les visiteurs d'y accéder directement via leur navigateur. Cela renforcera la sécurité de votre site web et empêchera les tentatives de piratage.

N'hésitez pas à contacter notre équipe d'assistance si vous avez des questions sur la mise en place de cette protection.

--------------------------------------------------------------------------------------------------------------------------------------

## <strong>❤️</strong> (Contribuer) <strong>❤️</strong>

[![Donate](https://img.shields.io/badge/paypal-donate-yellow.svg?style=flat)](https://www.paypal.me/nuggan85) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/3319a02c269049cfa8720f3b7c408046)](https://app.codacy.com/gh/NuggaN85/Protection-Anti-Plagiat/commits?bid=14837328) [![v1.8.0](http://img.shields.io/badge/zip-v1.8.0-blue.svg)](https://github.com/NuggaN85/Protection-Anti-Plagiat/archive/master.zip) [![GitHub issues](https://img.shields.io/github/issues/NuggaN85/Protection-Anti-Plagiat)](https://github.com/NuggaN85/Protection-Anti-Plagiat/issues) [![GitHub forks](https://img.shields.io/github/forks/NuggaN85/Protection-Anti-Plagiat)](https://github.com/NuggaN85/Protection-Anti-Plagiat/network) [![GitHub stars](https://img.shields.io/github/stars/NuggaN85/Protection-Anti-Plagiat)](https://github.com/NuggaN85/Protection-Anti-Plagiat/stargazers) [![GitHub license](https://img.shields.io/github/license/NuggaN85/Protection-Anti-Plagiat)](https://github.com/NuggaN85/Protection-Anti-Plagiat)

<a target="_blank" href="https://www.dmca.com/Protection/Status.aspx?ID=e1725bf3-1ec4-44bb-b65e-0a20fd4919fa&refurl=https://github.com/NuggaN85/Protection-Anti-Plagiat" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca_protected_sml_120d.png?ID=e1725bf3-1ec4-44bb-b65e-0a20fd4919fa"  alt="DMCA.com Protection Status" /></a>

--------------------------------------------------------------------------------------------------------------------------------------

- 🐞 Signalez-nous les bugs que vous remarquez sur via [Github](https://github.com/NuggaN85/Protection-Anti-Plagiat/issues/1).
- 💡 Nous-suggérez des modifications sur via [Github](https://github.com/NuggaN85/Protection-Anti-Plagiat/issues/2).
- 📢 Suivez [@NuggaN85](https://bsky.app/profile/nuggan85.bsky.social) sur Bluesky
- 💬 Discord : https://discord.gg/3FeWMvWdna

--------------------------------------------------------------------------------------------------------------------------------------
