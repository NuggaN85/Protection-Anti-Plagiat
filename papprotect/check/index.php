<?php
// Effectue une redirection permanente vers "../../index.php"
header("HTTP/1.1 301 Moved Permanently");
header("Location: ../../index.php");
exit();
?>
