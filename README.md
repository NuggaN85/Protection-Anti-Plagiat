# Protection Anti Plagiat <img src="https://camo.githubusercontent.com/fe2cb3af77c3290cd9437c142662cbd08bbbc027/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031352f35312f313435303130333535302d736865696c642e706e67">

```
 * Dev: NuggaN85
 * Github: NuggaN85
 * Twitter: @NuggaN85
 * Copyright © 2015 All rights reserved.
 * Licensed under CC BY 3.0
```
<img src="https://camo.githubusercontent.com/8311875fd722ba69ded3fb1ffc0e9b60562b6024/687474703a2f2f696d6167652e6e6f656c736861636b2e636f6d2f66696368696572732f323031362f32322f313436343838363332362d70617070726f74656374323031362e6a7067">

## :fr: Présentation

Ce script vous permettra de protéger votre site web contre les attaques d'aspirateurs de site web pour éviter les plagiats (comme le logiciel le plus connus qui est <strong>"HTTRACK"</strong>).

Deux systéme de sécurité (Encodage automatique dans un fichier .cnx qui est pas reconu via le web et par notification via email).

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
- Discord dev : https://discord.gg/0xDPvJ79cDltmbAn
  
--------------------------------------------------------------------------------------------------------------------------------------

## :fr: Les sites qui utilise notre script

- https://www.tchatland.fr
- http://scrinder.com
- http://multimotion.livehost.fr
- http://papprotect.livehost.fr

--------------------------------------------------------------------------------------------------------------------------------------

## :fr: Vous connaissez pas trop en php ? alors prenez ce script plus simple a mettre directement a la racine de votre site web via ftp (www ou public_html).

Crée un fichier php nomer le en papprotect.php et mettre ceci dans vos pages : 

Inclure ceci dans vos pages html.
```PHP
// pour les pages html inclure comme ci avant la balise <!DOCTYPE html>
<?php require($base_dir.'papprotect.php'); ?> 
```

Inclure ceci dans vos pages php.
```PHP
// pour les pages php inclure comme ci juste après la balise <?php
require($base_dir.'papprotect.php'); 
```

Le code php a mettre dans votre papprotect.php

```PHP
<?php
    // On fait apparaitre le nom du navigateur utilisé.
    $navigateur = $_SERVER["HTTP_USER_AGENT"];
	
    // On fait une array() des aspirateurs.
    $bannav = Array('HTTrack','MJ12bot','httrack','HTTPClient','websitecopier','webcopier');
    
    // On fait une foreach de l'Array() contenant les navigateurs interdits.
    foreach ($bannav as $banned) { 
	
        // On verifie si le navigateur utilisé est présent dans le tableau array().
        $comparaison = strstr($navigateur, $banned);

        // S'il est présent.
        if($comparaison !== false) {
            // On créer un fichier qui contiendras l'IP de la personne qui a aspirer notre site.
            $log = 'log-papprotect.cnx';
            $fichier = file_get_contents($log);
            $fichier .= $_SERVER['REMOTE_ADDR']."\n\n";
            
            file_put_contents($log, $fichier);
            
            // contenu du fichier que l'aspirateur va avoir.
            echo utf8_decode '<center>Vous avez utiliser '.$navigateur.' et a été bloquer part notre systéme de sécurité.</center>';
           
        die(); } 
?>

```

<img src="https://image-cc.s3.envato.com/files/188641819/Cover-min.jpg">

<ul>
<li>
<strong>SQLi Protection</strong> – Protection module for SQL Injections (SQLi) and XSS Vulnerabilities.</li>
<li>
<strong>Mass Requests Protection</strong> – Protection Module for Mass Requests that are made in order to overload your site.</li>
<li>
<strong>Spam Protection</strong> – Protection Module for Spammers and Spam Bots that aim to spam your site.</li>
<li>
<strong>Proxy Protection</strong> – Protection Module from Proxy Visitors or so-called people hiding behind proxies.</li>
<li>
<strong>Malicious Files Scanner</strong> – Scanner for Malicious Files that will scan your website and will notify you if viruses are detected.</li>
<li>
<strong>Input Sanitization</strong> – Protection Module that automatically will sanitize all incoming and outgoing fields and requests.</li>
<li>
<strong>DNSBL Integration</strong> – Integration with some of the best Spam Databases (DNSBL) to protect your website from Bad Visitors.</li>
<li>
<strong>Tor Protection</strong> – Detect and block visitors that use the Tor Browser to hide their Identify and to do malicious or suspicious things.</li>
<li>
<strong>Intelligent Pattern Recognition</strong> to Detect Unknown Attacks</li>
<li>
<strong>Industrial-Strength Algorithms</strong> to Detect Known Hacker Attacks</li>
<li>
<strong>Ban System</strong> – Ban System with which can be blocked and redirected Users, Countries, Operating Systems, Browsers and Internet Service Providers.</li>
<li>
<strong>Bad Bots and Crawlers Protection</strong> – Blocks many Bad Bots and Crawlers that will wast your website bandwidth</li>
<li>
<strong>Fake Bot Protection</strong> – When search engine bot visits your website will be verified if it is real or fake bot</li>
<li>
<strong>Bad Bots Protection</strong> – All visitors that are Bad Bots or are without User-Agent will be detected and their access to the website will be blocked</li>
<li>
<strong>Headers Check</strong> – Every visitor’s response headers will be checked and if there are suspicious object their access to the website will be blocked</li>
<li>
<strong>Real-Time Scanning of All Requests</strong> – GET, POST and other types of Data</li>
<li>
<strong>Auto Ban</strong> – Function that will automatically block attackers and threats such as Bad Bots, Crawlers and other.</li>
<li>
<strong>Attack Logs</strong> – Function that will log each attack and threat in the Database, so you can view them later. (No Duplicates)</li>
<li>
<strong>Detailed Logs</strong> – The threat logs contain many and useful information about the Hacker / Threat like Browser, Operating System, Country, State, City, User Agent and Location on the Map.</li>
<li>
<strong>E-Mail Notifications</strong> – Receive E-Mail Notifications when attack or threat is detected.</li>
</ul>

Buy Now 35$ http://goo.gl/Ut6kAB
