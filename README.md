# Protection Anti Plagiat <img src="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67">

Ce script vous permettra de protéger votre site web contre les attaques d'aspirateurs de site web pour éviter les plagiats (comme le logiciel le plus connus qui est <strong>HTTRACK</strong>).

Deux systéme de sécurité (Encodage automatique dans un fichier .cnx qui est pas reconu via le web et par notification via email).

Mettre le fichier "protectionantiplagiatr.php" à la racine de votre site web. Exemple de dossier : (public_html) ou (www), un autre fichier "protectionantiplagiat.cnx" va s'inclure automatiquement a la racine avec votre fichier "protectionantiplagiat.php" celui ci va imprimer tout les fraudeurs qui tente d'aspirer votre site web.

<strong>Attention !</strong>
Pour les fichiers en <strong>php</strong>, inclure ceci " include('protectionantiplagiat.php'); " juste après la balise " <?php " dans les pages souhaitées. Préférablement, dans <strong>config.php</strong> de votre site web.

<strong>Attention !</strong>
Pour les fichiers en <strong>html</strong>, mettre ceci " <?php include('protectionantiplagiat.php'); ?> " avant la balise " <!DOCTYPE html> dans les pages souhaitées de votre site web.

<strong>Attention !</strong>
Supprimer le dossier <strong>check</strong> ceci est un dossier test pour un futur update.
  
--------------------------------------------------------------------------------------------------------------------------------------

# Versions update <img src="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67">

* protectionantiplagiat init v1.0 <img src="https://camo.githubusercontent.com/56afb73a7cf51147fcce4e3524c21ff6f00ced82/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303435353638322d626574612d312e706e67">
* protectionantiplagiat v1.1 // Ajout de plusieur aspirateur dans $bannav = Array.
* protectionantiplagiat v1.2 // Bug fix $comparaison
* protectionantiplagiat v1.3 // Ajout de l'extension .cnx + auto instalation.
* protectionantiplagiat v1.4 // Ajout des informations '.$navigateur.' '.getip().' que l'utilisateur verra dans les fichiers voler.
* protectionantiplagiat v1.5 // Optimisation de la function getip()
* protectionantiplagiat v1.6 // Ajout notification via email.
* protectionantiplagiat v1.7 // Amélioration de la fonction notification email.
* protectionantiplagiat v1.8 // Ajout de la fonction $hostname et geturl()
* protectionantiplagiat v1.9 // Ajout des imformations '.$navigateur.'' .getip() $hostname et .geturl() dans la notification email.
* protectionantiplagiat v1.10 // Ajout des informations $hostname que l'utilisateur verra dans les fichiers voler.

<a target="_blank" href="http://www.copyscape.com/"><img src="http://banners.copyscape.com/img/copyscape-banner-white-200x25.png" width="200" height="25" border="0" alt="Protected by Copyscape" title="Protected by Copyscape Plagiarism Checker - Do not copy content from this page." /></a> <a target="_blank" href="https://www.paypal.me/LudovicRose"><img src="https://camo.githubusercontent.com/bfb76a1ed98dc39e715b62c6f2aa032d1a2765d7/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303137363936362d70617970616c2e706e67" width="200" height="25" border="0" alt="Donation Paypal" /></a>

thank you in advance: https://gitroom.org/?p=60764

--------------------------------------------------------------------------------------------------------------------------------------

# Screenshot d'exemple d'attaques d'aspirateur <img src="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67">

<img src="https://camo.githubusercontent.com/a281c4736a4674100b22b5cc457a847f1afacc53/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303137353131372d73637265656e73686f742d312e706e67">
<img src="https://camo.githubusercontent.com/bf66fa5781e4dddba350d80739a965d8e85f7dac/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303433373934312d73637265656e73686f742d312e706e67">
<img src="https://camo.githubusercontent.com/8a4bf3f89ef95fc34029faf0dd8a80e798593d68/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303433373935312d73637265656e73686f742d322e706e67">
