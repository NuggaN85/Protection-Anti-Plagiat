# Protection Anti Plagiat <img src="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67">

<img src="https://camo.githubusercontent.com/dc69afaa3d3b6cb1722b45645f7f26f5f17cbfc2/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031362f30322f313435323731353231392d31363837312e706e67">

```
 * Dev: NuggaN85
 * Github: NuggaN85
 * Twitter: @NuggaN85
 * Copyright © 2015 All rights reserved.
 * Licensed under CC BY 3.0
```

Ce script vous permettra de protéger votre site web contre les attaques d'aspirateurs de site web pour éviter les plagiats (comme le logiciel le plus connus qui est <strong>"HTTRACK"</strong>).

Deux systéme de sécurité (Encodage automatique dans un fichier .cnx qui est pas reconu via le web et par notification via email).

Mettre le dossier "<strong>PAP</strong>" à la racine de votre site web. Exemple dans le dossier : (public_html) ou (www), un autre fichier "papprotect-log.cnx" va s'inclure automatiquement a la racine de votre dossier "<strong>PAP</strong>" celui ci va imprimer tout les fraudeurs qui tente d'aspirer votre site web.

<strong>Attention !</strong>
Pour les fichiers en <strong>php</strong>, inclure ceci " include('papprotect.php'); " juste après la balise " <?php " dans les pages souhaitées. Préférablement, dans <strong>config.php</strong> de votre site web.

<strong>Attention !</strong>
Pour les fichiers en <strong>html</strong>, mettre ceci " <?php include('papprotect.php'); ?> " avant la balise " <!DOCTYPE html> dans les pages souhaitées de votre site web.

Inclure ceci dans vos pages html.
```PHP
// pour les pages html inclure comme ci avant la balise <!DOCTYPE html>
<?php require($base_dir.'pap/papprotect.php'); ?> 
```

Inclure ceci dans vos pages php.
```PHP
// pour les pages php inclure comme ci juste après la balise <?php
require($base_dir.'pap/papprotect.php'); 
```

Ajouter ceci dans votre .htaccess
```
<Files papprotect-log.cnx>
order allow,deny
deny from all
</files>
```

[![Donate](https://img.shields.io/badge/paypal-donate-yellow.svg?style=flat)](https://www.paypal.me/LudovicRose)

<a target="_blank" href="http://www.copyscape.com/"><img src="http://banners.copyscape.com/img/copyscape-banner-white-200x25.png" width="200" height="25" border="0" alt="Protected by Copyscape" title="Protected by Copyscape Plagiarism Checker - Do not copy content from this page." /></a>

Site Web : http://papprotect.livehost.fr
  
--------------------------------------------------------------------------------------------------------------------------------------

# Versions update ![alt tag](https://camo.githubusercontent.com/c854ccb6625c6674287cf084391dc66983ac6ec1/687474703a2f2f696d6731352e686f7374696e67706963732e6e65742f706963732f35393837303066696c6539342e706e67)

```
* protectionantiplagiat init v1.0 
* protectionantiplagiat v1.1 // Liste des bots aspirateur en fichier externe 'bannav.php'.
* protectionantiplagiat v1.2 // Ajout du fichier data.php qui regroupe les requies.
* protectionantiplagiat v1.3 // Ajout du fichier log en .cnx pour que ce fichier ne soit lu sur le web.
* protectionantiplagiat v1.4 // Ajout du fichier email pour recevoir des notifications ( optionel ).
```
--------------------------------------------------------------------------------------------------------------------------------------

# Exemple log ![alt tag](https://camo.githubusercontent.com/c854ccb6625c6674287cf084391dc66983ac6ec1/687474703a2f2f696d6731352e686f7374696e67706963732e6e65742f706963732f35393837303066696c6539342e706e67)

```
[INFORMATION CLIENT] 

Mozilla/4.5 (compatible; HTTrack 3.0x; Windows 98)

IP CLIENT : 'ici l'ip du client'

PORT CLIENT : 'ici le port du client' 

HOST CLIENT : 'ici le host du client'  

POUR PLUS AVOIR DE SOUCI VEUILLEZ BLOQUER LE CLIENT DANS LA BLACKLIST.
```
