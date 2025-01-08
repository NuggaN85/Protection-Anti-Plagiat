<?php
// Définir le chemin de base en utilisant __DIR__ pour être sûr du répertoire de ce script.
define('BASE_DIR', __DIR__ . '/');

// Initialiser la variable de tentative.
$tentative = 0;

// Récupérer les fichiers externes
define('PROTECT_FILE', BASE_DIR . 'papprotect/papprotect.php');
define('LOG_FILE', BASE_DIR . 'papprotect/papprotect-log.cnx');
define('BAD_BOTS_FILE', BASE_DIR . 'papprotect/bad_bots.php');

// Vérifier si les fichiers de protection sont manquants et afficher un message approprié.
if (!file_exists(PROTECT_FILE)) {
    trigger_error('Les fichiers de protection sont manquants!', E_USER_ERROR);
}
require_once(PROTECT_FILE);

// Vérifier si le fichier des bots est manquant et afficher un message approprié.
if (!file_exists(BAD_BOTS_FILE)) {
    trigger_error('Le fichier bad_bots.php est manquant!', E_USER_ERROR);
}
$bad_bots = require(BAD_BOTS_FILE);

// Fonction pour récupérer l'adresse IP de l'utilisateur.
function getUserIP() {
    $keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED_PROTO', 'HTTP_CF_VISITOR', 'HTTP_CF_CONNECTING_IP', 'X-Real-IP', 'REMOTE_ADDR');
    foreach ($keys as $key) {
        if (isset($_SERVER[$key]) && filter_var($_SERVER[$key], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false) {
            return $_SERVER[$key];
        }
    }
    return '';
}

// Récupérer le port et le host.
$ra = filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP);
$up = filter_input(INPUT_SERVER, 'REMOTE_PORT', FILTER_VALIDATE_INT);

// Données des attaques de bot aspirateur.
$ss = $_SERVER['SERVER_SOFTWARE'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$sf = $_SERVER['SCRIPT_FILENAME'];

// Vérifier si l'agent utilisateur est dans la liste des aspirateurs.
if (in_array($ua, $bad_bots, true)) {
    die();
} else {
    foreach ($bad_bots as $banned) {
        if (strpos($ua, $banned) !== false) {
            $tentative++;
        }
    }
}

// Récupérer les informations et les écrire dans le fichier de log.
if ($tentative > 0) {
    // Créer une entrée de log.
    $log = "[" . date('Y-m-d H:i:s') . "] [" . $ss . "] [" . $ua . "] [" . getUserIP() . "] [" . $up . "] [" . $ra . "] [" . $sf . "]";
    file_put_contents(LOG_FILE, "\n" . $log, FILE_APPEND);

    // Message à afficher pour le voleur.
    $message = "Votre téléchargement est en cours de traitement. Veuillez patienter...";
    echo '<div style="text-align:center;"><img src="https://camo.githubusercontent.com/e73fb5bda4df97a30987b09cae8cf58b6e76ac7f1ca41753671050be1a6e5c33/68747470733a2f2f65787465726e616c2d636f6e74656e742e6475636b6475636b676f2e636f6d2f69752f3f753d68747470732533412532462532467777772e666964656c697a617274652e7074253246626c6f6725324677702d636f6e74656e7425324675706c6f616473253246323031392532463039253246315f312d31303234783536312e706e6726663d31266e6f66623d31266970743d646631653837663661336238313133653333663135633463616161373863306333306438313630656132633933643039636131626435666565356338363661372669706f3d696d61676573" border="0" /></div>';
    echo "<br><br>";
    echo '<div style="width: 100%; text-align: center; font-weight: bold">[Site web est protégé, vos informations sont enregistrées] <br><br>' . htmlspecialchars($ss) . ' ' . htmlspecialchars($ua) . ' <br><br>IP CLIENT : ' . htmlspecialchars(getUserIP()) . ' <br><br>PORT CLIENT : ' . htmlspecialchars($up) . ' <br><br>HOST CLIENT : ' . htmlspecialchars($ra) . '</div>';
    echo "<br><br>";
    echo '<div style="width: 100%; text-align: center; font-weight: bold">[Website is protected, your information is recorded] <br><br>' . htmlspecialchars($ss) . ' ' . htmlspecialchars($ua) . ' <br><br>IP CLIENT : ' . htmlspecialchars(getUserIP()) . ' <br><br>PORT CLIENT : ' . htmlspecialchars($up) . ' <br><br>HOST CLIENT : ' . htmlspecialchars($ra) . '</div>';

    exit();
}
?>
