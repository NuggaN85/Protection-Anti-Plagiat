<?php
// Utilisez la constante DIRECTORY_SEPARATOR pour garantir la portabilité des chemins
$redirect_path = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "index.php";

// Assurez-vous que le chemin est sécurisé en utilisant realpath()
$redirect_path = realpath($redirect_path);

// Vérifiez que le chemin est valide avant de procéder à la redirection
if ($redirect_path !== false && is_file($redirect_path)) {
    // Utilisez la fonction header() pour envoyer l'en-tête de redirection
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $redirect_path);
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
