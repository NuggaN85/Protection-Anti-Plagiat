<?php
/**
 * papprotect.php — Point d'entrée de la protection anti-plagiat
 *
 * À inclure en tête de chaque page à protéger.
 * Détecte les bots aspirateurs, journalise les tentatives et bloque l'accès.
 */

declare(strict_types=1);

// ── Chemins ──────────────────────────────────────────────────────────────────
define('PAPPROTECT_DIR',  __DIR__ . '/papprotect/');
define('PROTECT_FILE',    PAPPROTECT_DIR . 'papprotect.php');
define('BAD_BOTS_FILE',   PAPPROTECT_DIR . 'bad_bots.php');
define('LOG_FILE',        PAPPROTECT_DIR . 'papprotect-log.cnx');

// ── Dépendances ───────────────────────────────────────────────────────────────
foreach ([PROTECT_FILE => 'fichiers de protection', BAD_BOTS_FILE => 'bad_bots.php'] as $file => $label) {
    if (!is_file($file)) {
        trigger_error("Le fichier $label est manquant : $file", E_USER_ERROR);
    }
}

require_once PROTECT_FILE;

/** @var array<string> $bad_bots */
$bad_bots = require BAD_BOTS_FILE;

// ── Détection ─────────────────────────────────────────────────────────────────

/**
 * Retourne l'adresse IP cliente la plus fiable disponible.
 */
function getUserIP(): string
{
    $headers = [
        'HTTP_CF_CONNECTING_IP',   // Cloudflare (priorité haute)
        'HTTP_X_FORWARDED_FOR',
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_PROTO',
        'HTTP_CF_VISITOR',
        'X-Real-IP',
        'REMOTE_ADDR',
    ];

    foreach ($headers as $key) {
        $value = $_SERVER[$key] ?? '';
        // Prendre la première IP de la liste (X-Forwarded-For peut en contenir plusieurs)
        $ip = trim(explode(',', $value)[0]);
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            return $ip;
        }
    }

    // Repli sur REMOTE_ADDR sans restriction de plage
    return filter_var($_SERVER['REMOTE_ADDR'] ?? '', FILTER_VALIDATE_IP) ?: '';
}

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$hits      = 0;

// Correspondance exacte en priorité (plus rapide)
if (in_array($userAgent, $bad_bots, true)) {
    $hits = 1;
} else {
    // Correspondance partielle (sous-chaîne)
    foreach ($bad_bots as $pattern) {
        if ($pattern !== '' && stripos($userAgent, $pattern) !== false) {
            $hits++;
        }
    }
}

// ── Blocage & journalisation ──────────────────────────────────────────────────
if ($hits > 0) {
    $ip     = getUserIP();
    $port   = filter_var($_SERVER['REMOTE_PORT'] ?? '', FILTER_VALIDATE_INT) ?: 'N/A';
    $ra     = filter_var($_SERVER['REMOTE_ADDR']  ?? '', FILTER_VALIDATE_IP) ?: 'N/A';
    $ss     = $_SERVER['SERVER_SOFTWARE']   ?? 'N/A';
    $sf     = $_SERVER['SCRIPT_FILENAME']   ?? 'N/A';

    // Journalisation
    $entry = sprintf(
        '[%s] [%s] [%s] [%s] [%s] [%s] [%s]',
        date('Y-m-d H:i:s'),
        $ss,
        $userAgent,
        $ip,
        $port,
        $ra,
        $sf
    );
    @file_put_contents(LOG_FILE, PHP_EOL . $entry, FILE_APPEND | LOCK_EX);

    // Réponse au bot (affiche des infos inoffensives pour le décourager)
    $safeUA = htmlspecialchars($userAgent, ENT_QUOTES, 'UTF-8');
    $safeIP = htmlspecialchars($ip,        ENT_QUOTES, 'UTF-8');
    $safePo = htmlspecialchars((string)$port, ENT_QUOTES, 'UTF-8');
    $safeRa = htmlspecialchars($ra,        ENT_QUOTES, 'UTF-8');
    $safeSs = htmlspecialchars($ss,        ENT_QUOTES, 'UTF-8');

    echo <<<HTML
    <div style="text-align:center">
        <img src="https://camo.githubusercontent.com/e73fb5bda4df97a30987b09cae8cf58b6e76ac7f1ca41753671050be1a6e5c33/68747470733a2f2f65787465726e616c2d636f6e74656e742e6475636b6475636b676f2e636f6d2f69752f3f753d68747470732533412532462532467777772e666964656c697a617274652e7074253246626c6f6725324677702d636f6e74656e7425324675706c6f616473253246323031392532463039253246315f312d31303234783536312e706e6726663d31266e6f66623d31266970743d646631653837663661336238313133653333663135633463616161373863306333306438313630656132633933643039636131626435666565356338363661372669706f3d696d61676573"
             alt="Protection" border="0">
    </div>
    <br><br>
    <div style="width:100%;text-align:center;font-weight:bold">
        [Site web protégé — vos informations sont enregistrées]<br><br>
        $safeSs $safeUA<br><br>
        IP CLIENT : $safeIP<br><br>
        PORT CLIENT : $safePo<br><br>
        HOST CLIENT : $safeRa
    </div>
    <br><br>
    <div style="width:100%;text-align:center;font-weight:bold">
        [Website protected — your information has been recorded]<br><br>
        $safeSs $safeUA<br><br>
        IP CLIENT : $safeIP<br><br>
        PORT CLIENT : $safePo<br><br>
        HOST CLIENT : $safeRa
    </div>
    HTML;

    exit();
}
