<?php
// Chemin vers le fichier JSON
$jsonFile = 'data/playlists.json';

// Vérifier si le fichier existe
if (!file_exists($jsonFile)) {
    die("Le fichier JSON n'existe pas.");
}

// Lire le contenu du fichier JSON
$jsonData = file_get_contents($jsonFile);

// Convertir le JSON en tableau PHP
$playlists = json_decode($jsonData, true);

// Vérifier si des playlists existent
if (is_array($playlists) && count($playlists) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Musiques</th></tr>";

    // Afficher chaque playlist
    foreach ($playlists as $playlist) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($playlist["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($playlist["nom"]) . "</td>";
        echo "<td>";

        // Afficher les musiques
        foreach ($playlist["musiques"] as $musique) {
            echo htmlspecialchars($musique["titre"]) . " par " . htmlspecialchars($musique["auteur"]) . " (" . htmlspecialchars($musique["duree"]) . ")<br>";
        }

        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucune playlist trouvée.";
}
?>
