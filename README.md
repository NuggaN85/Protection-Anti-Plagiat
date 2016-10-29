# <img src ="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67" /> papprotect

```
 * Protection Anti Plagiat
 * Dev: NuggaN85
 * Github: NuggaN85
 * Twitter: @NuggaN85
 * Copyright © 2015 All rights reserved.
 * Licensed under CC BY 3.0
```
<div style="text-align:center"><img src ="https://camo.githubusercontent.com/8311875fd722ba69ded3fb1ffc0e9b60562b6024/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031362f32322f313436343838363332362d70617070726f74656374323031362e6a7067" /></div>

## :fr: Présentation

Ce script vous permettra de protéger votre site web contre les attaques d'aspirateurs de site web pour éviter les plagiats et voir vos site web en vente en temps que <strong>NULLED</strong>, les aspirateurs (comme le logiciel le plus connus qui est <strong>"HTTRACK"</strong>) serons bannis automatiquement grace a notre systéme de blocage.

Deux systéme de sécurité (Encodage automatique dans un fichier <strong>.CNX</strong> qui est pas reconu via le web et par notification via email).

## :fr: Instalation

Mettre le dossier "<strong>papprotect</strong>" à la racine de votre site web. Exemple dans le dossier : (public_html) ou (www), un autre fichier "papprotect-log.cnx" va s'inclure automatiquement a la racine de votre dossier "<strong>papprotect</strong>" celui ci va imprimer tout les fraudeurs qui tente d'aspirer votre site web.

## :uk: setup

Put the folder "<strong>papprotect</strong>" at the root of your website. Eg in the folder (public_html) or (www), another "papprotect-log.cnx" file will automatically include the root of your file "<strong>papprotect</strong>" this one will print all fraudsters trying to suck your website.

## :fr: Important

<strong>:warning:</strong>
Pour les fichiers en <strong>php</strong>, inclure " include('papprotect/papprotect.php'); " juste après la balise " <?php " dans les pages souhaitées. Préférablement, dans <strong>config.php</strong> de votre site web.

<strong>:warning:</strong>
Pour les fichiers en <strong>html</strong>, mettre " <?php include('papprotect/papprotect.php'); ?> " avant la balise " <!DOCTYPE html> dans les pages souhaitées de votre site web.

Inclure ceci dans vos pages html.
```PHP
// pour les pages html inclure comme ci avant la balise <!DOCTYPE html>
<?php require($base_dir.'papprotect/papprotect.php'); ?> 
```

Inclure ceci dans vos pages php.
```PHP
// pour les pages php inclure comme ci juste après la balise <?php
require($base_dir.'papprotect/papprotect.php'); 
```

Ajouter ceci dans votre .htaccess
```
<Files papprotect-log.cnx>
order allow,deny
deny from all
</files>
```

## :fr: Contribuer

[![Donate](https://img.shields.io/badge/paypal-donate-yellow.svg?style=flat)](https://www.paypal.me/LudovicRose)

<a target="_blank" href="http://www.copyscape.com/"><img src="http://banners.copyscape.com/img/copyscape-banner-white-200x25.png" width="200" height="25" border="0" alt="Protected by Copyscape" title="Protected by Copyscape Plagiarism Checker - Do not copy content from this page." /></a>

- Signalez-nous les bugs que vous remarquez sur via [Github](https://github.com/NuggaN85/Protection-Anti-Plagiat/issues/1).
- Nous-suggérez des modifications sur via [Github](https://github.com/NuggaN85/Protection-Anti-Plagiat/issues/2).
- Suivez [@NuggaN85](https://twitter.com/NuggaN85) sur Twitter
- Site Web : http://papprotect.livehost.fr
- Discord dev : https://discord.me/nuggan85
  
--------------------------------------------------------------------------------------------------------------------------------------

## :fr: Les sites qui utilise notre script

- https://www.tchatland.fr
- https://social-gaming.fr
- http://multimotion.livehost.fr
- http://papprotect.livehost.fr

--------------------------------------------------------------------------------------------------------------------------------------

<div style="text-align:center"><img src ="https://camo.githubusercontent.com/7ee6ae4ef352b22e7cad4919f4dd4246b6454610/68747470733a2f2f696d6167652d63632e73332e656e7661746f2e636f6d2f66696c65732f3138383634313831392f436f7665722d6d696e2e6a7067" /></div>

<ul>
<li>
<strong>SQLi Protection</strong> – Module de protection pour Injections SQL (SQL) et XSS vulnérabilités.</li>
<li>
<strong>Mass Requests Protection</strong> – Module de protection pour les demandes de masse qui sont faites afin de surcharger votre site.</li>
<li>
<strong>Spam Protection</strong> – Module de protection pour polluposteurs et Spam Bots qui visent à spam de votre site.</li>
<li>
<strong>Proxy Protection</strong> – Module de protection de proxy Visiteurs ou soi-disant gens qui se cachent derrière les proxies.</li>
<li>
<strong>Malicious Files Scanner</strong> – Scanner pour les fichiers malveillants qui va scanner votre site Web et vous avertir si des virus sont détectés.</li>
<li>
<strong>Input Sanitization</strong> – Module de protection qui sera automatiquement aseptiser tous les champs et les requêtes entrantes et sortantes.</li>
<li>
<strong>DNSBL Integration</strong> – Intégration avec certaines des meilleures bases de données de spam (DNSBL) pour protéger votre site web à partir de Bad visiteurs.</li>
<li>
<strong>Tor Protection</strong> – Détecter et bloquer les visiteurs qui utilisent le navigateur Tor pour cacher leur identité et de faire des choses malveillantes ou suspectes.</li>
<li>
<strong>Reconnaissance Pattern Intelligence</strong> pour détecter les attaques inconnues</li>
<li>
<strong>Algorithmes Industrial-Force</strong> pour détecter les attaques de pirates connus</li>
<li>
<strong>Ban System</strong> – Système Ban qui peut être bloqué et redirigé les utilisateurs, les pays, les systèmes d'exploitation, les navigateurs et les fournisseurs de services Internet.</li>
<li>
<strong>Bad Bots and Crawlers Protection</strong> – Blocks beaucoup de Bad Bots et Crawlers qui perdre votre bande passante d'un site web </li>
<li>
<strong>Fake Bot Protection</strong> – Lorsque bot moteur de recherche visite votre site Web sera vérifiée si elle est bot vrai ou faux</li>
<li>
<strong>Bad Bots Protection</strong> – Tous les visiteurs qui sont Bad Bots ou sont sans User-Agent seront détectés et leur accès au site seront bloqués</li>
<li>
<strong>Headers Vérifier</strong> – Tous les visiteurs têtes de réponse seront vérifiés et s'il y a un objet suspect leur accès au site seront bloqués</li>
<li>
<strong>Analyse en temps réel de toutes les demandes</strong> – GET, POST et d'autres types de données</li>
<li>
<strong>Auto Ban</strong> –Fonction qui permet de bloquer automatiquement les attaques et les menaces telles que Bad Bots, Crawlers et autres.</li>
<li>
<strong>Journaux d'attaque</strong> – Fonction qui se connectera chaque attaque et menace dans la base de données, de sorte que vous pouvez les voir plus tard. (No Duplicates)</li>
<li>
<strong>journaux détaillés</strong> – Les journaux de menaces contiennent de nombreux et utiles informations sur le Hacker / Threat comme navigateur, système d'exploitation, Pays, État, Ville, User Agent et emplacement sur la carte.</li>
<li>
<strong>Notifications par email</strong> – Recevoir des notifications par courriel quand l'attaque ou la menace est détectée.</li>
<li>
<strong>Acheter</strong> – http://goo.gl/Ut6kAB</li>
</ul>
