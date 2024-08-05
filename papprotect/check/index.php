<?php
// Utilisez la constante DIRECTORY_SEPARATOR pour garantir la portabilité des chemins
$redirect_path = realpath(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "index.php");

// Vérifiez que le chemin est valide et sécurisé avant de procéder à la redirection
if ($redirect_path !== false && is_file($redirect_path)) {
    // Utilisez la fonction header() pour envoyer l'en-tête de redirection
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /index.php"); // Utilisez une URL relative ou absolue pour la redirection
    // Assurez-vous que le script se termine après la redirection
    exit();
} else {
    // Si le chemin n'est pas valide, vous pouvez gérer l'erreur de manière appropriée
    // Par exemple, vous pouvez rediriger vers une page d'erreur ou afficher un message
    echo "Redirection impossible. Veuillez contacter l'administrateur.";
    // Terminer le script
    exit();
}
?>
