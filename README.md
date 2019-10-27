# <img src ="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67" /> Protection-Anti-Plagiat

```
 * Dev: NuggaN85
 * Github: NuggaN85
 * Twitter: @NuggaN85
 * Copyright © 2015 - 2019 All rights reserved.
 * Licensed under CC BY 3.0
```
<div style="text-align:center"><img src ="https://camo.githubusercontent.com/8311875fd722ba69ded3fb1ffc0e9b60562b6024/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031362f32322f313436343838363332362d70617070726f74656374323031362e6a7067" /></div>

🛡️ Présentation

Ce script vous permettra de protéger votre site web contre les attaques d'aspirateurs de site web pour éviter les plagiats et voir vos site web en vente en temps que <strong>NULLED</strong>, les aspirateurs (comme le logiciel le plus connus qui est <strong>"HTTRACK"</strong>) serons bannis automatiquement grace a notre systéme de blocage.

Deux systéme de sécurité (Encodage automatique dans un fichier <strong>.CNX</strong> qui est pas reconu via le web).

🛡️ Instalation

Mettre le dossier "<strong>papprotect</strong>" à la racine de votre site web. Exemple dans le dossier : (public_html) ou (www), un autre fichier "papprotect-log.cnx" va s'inclure automatiquement a la racine de votre dossier "<strong>papprotect</strong>" celui ci va imprimer tout les fraudeurs qui tente d'aspirer votre site web.

🛡️ Setup

Put the folder "<strong>papprotect</strong>" at the root of your website. Eg in the folder (public_html) or (www), another "papprotect-log.cnx" file will automatically include the root of your file "<strong>papprotect</strong>" this one will print all fraudsters trying to suck your website.

🛡️ Important

<strong>:warning:</strong>
Pour les fichiers en <strong>php</strong>, inclure " ``` include_once($base_dir. 'papprotect/papprotect.php');``` " juste après la balise " <?php " dans les pages souhaitées. Préférablement, dans <strong>config.php</strong> de votre site web.

<strong>:warning:</strong>
Pour les fichiers en <strong>html</strong>, mettre " ``` <?php include_once($base_dir. 'papprotect/papprotect.php'); ?> ``` " avant la balise " <!DOCTYPE html> dans les pages souhaitées de votre site web.

<strong>:warning:</strong>
Pour certain fichier en .html renomer les en extension .php

Inclure ceci dans vos pages html.
```
// pour les pages html inclure comme ci avant la balise <!DOCTYPE html>
<?php include_once($base_dir. 'papprotect/papprotect.php'); ?> 
```

Inclure ceci dans vos pages php.
```
// pour les pages php inclure comme ci juste après la balise <?php
include_once($base_dir. 'papprotect/papprotect.php');
```

Ajouter ceci dans votre .htaccess
```
<Files papprotect-log.cnx>
order allow,deny
deny from all
</files>
```

--------------------------------------------------------------------------------------------------------------------------------------

🛡️ Contribuer

<a href="https://www.paypal.me/LudovicRose" rel="nofollow"><img src="https://camo.githubusercontent.com/93df17879fa8f6a7a09e115cf16e9d728c9ff1f2/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f646f6e6174652d70617970616c2d3030343537632e7376673f6c6f676f3d70617970616c267374796c653d666c61742d737175617265" alt="Donate Paypal" data-canonical-src="https://img.shields.io/badge/donate-paypal-00457c.svg?logo=paypal&amp;style=flat-square" style="max-width:100%;"></a>

[![Donate](https://img.shields.io/badge/paypal-donate-yellow.svg?style=flat)](https://www.paypal.me/LudovicRose) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/3319a02c269049cfa8720f3b7c408046)](https://www.codacy.com/manual/NuggaN85/Protection-Anti-Plagiat?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=NuggaN85/Protection-Anti-Plagiat&amp;utm_campaign=Badge_Grade)

<a target="_blank" href="http://www.copyscape.com/"><img src="http://banners.copyscape.com/img/copyscape-banner-white-200x25.png" width="200" height="25" border="0" alt="Protected by Copyscape" title="Protected by Copyscape Plagiarism Checker - Do not copy content from this page." /></a>

--------------------------------------------------------------------------------------------------------------------------------------

- Signalez-nous les bugs que vous remarquez sur via [Github](https://github.com/NuggaN85/Protection-Anti-Plagiat/issues/1).
- Nous-suggérez des modifications sur via [Github](https://github.com/NuggaN85/Protection-Anti-Plagiat/issues/2).
- Suivez [@NuggaN85](https://twitter.com/NuggaN85) sur Twitter
- Site Web : https://tchatland.fr , https://belink.weax.net
- Discord dev : https://discord.me/nuggan85

--------------------------------------------------------------------------------------------------------------------------------------
