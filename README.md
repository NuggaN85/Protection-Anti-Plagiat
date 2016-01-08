# Protection Anti Plagiat <img src="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67">

Importer les fichiers externe.
```PHP
$base_dir = 'chek/';
require_once($base_dir.'os.php');
require_once($base_dir.'navigateur.php');
require_once($base_dir.'bannav.php');
```
Ce script vous permettra de protéger votre site web contre les attaques d'aspirateurs de site web pour éviter les plagiats (comme le logiciel le plus connus qui est <strong>"HTTRACK"</strong>).

Deux systéme de sécurité (Encodage automatique dans un fichier .cnx qui est pas reconu via le web et par notification via email).

Mettre le fichier "protectionantiplagiatr.php" à la racine de votre site web. Exemple de dossier : (public_html) ou (www), un autre fichier "protectionantiplagiat.cnx" va s'inclure automatiquement a la racine avec votre fichier "protectionantiplagiat.php" celui ci va imprimer tout les fraudeurs qui tente d'aspirer votre site web.

<strong>Attention !</strong>
Pour les fichiers en <strong>php</strong>, inclure ceci " include('protectionantiplagiat.php'); " juste après la balise " <?php " dans les pages souhaitées. Préférablement, dans <strong>config.php</strong> de votre site web.

<strong>Attention !</strong>
Pour les fichiers en <strong>html</strong>, mettre ceci " <?php include('protectionantiplagiat.php'); ?> " avant la balise " <!DOCTYPE html> dans les pages souhaitées de votre site web.

<a target="_blank" href="http://www.copyscape.com/"><img src="http://banners.copyscape.com/img/copyscape-banner-white-200x25.png" width="200" height="25" border="0" alt="Protected by Copyscape" title="Protected by Copyscape Plagiarism Checker - Do not copy content from this page." /></a> <a target="_blank" href="https://www.paypal.me/LudovicRose"><img src="https://camo.githubusercontent.com/bfb76a1ed98dc39e715b62c6f2aa032d1a2765d7/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303137363936362d70617970616c2e706e67" width="200" height="25" border="0" alt="Donation Paypal" /></a>

thank you in advance: https://gitroom.org/?p=60764
  
--------------------------------------------------------------------------------------------------------------------------------------

# Versions update

```PHP
* protectionantiplagiat init v1.0 
* protectionantiplagiat v1.1 // Liste des bots aspirateur en fichier externe 'bannav.php'.
* protectionantiplagiat v1.2 // Ajouts de 2 fichier externe 'os.php', 'navigateur.php'
```
--------------------------------------------------------------------------------------------------------------------------------------
