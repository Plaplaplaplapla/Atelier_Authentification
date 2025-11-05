<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur s'est bienconnecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php'); // Dans le cas contraire, l'utilisateur sera redirigé vers la page de connexion
    exit();
    
}


if (!isset($_COOKIE['authToken'])) {
    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['nb_connexions'])) {
    $_SESSION['nb_connexions'] = 1;
} else {
    $_SESSION['nb_connexions']++;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page protégée</title>
</head>
<body>
    <h1>Bienvenue sur la page utilisateur de l'atelier 3</h1>
    <p>Vous êtes connecté en tant que : <?php echo htmlspecialchars($_SESSION['username']); ?></p>
     <p>Vous vous êtes connecté <strong><?= $_SESSION['nb_connexions'] ?></strong> fois pendant cette session.</p>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>
