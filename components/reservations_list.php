<?php
// Chemin vers le fichier JSON
$jsonFile = 'data/reservations.json';

// Vérifier si le fichier existe
if (!file_exists($jsonFile)) {
    die("Le fichier JSON n'existe pas.");
}

// Lire le contenu du fichier JSON
$jsonData = file_get_contents($jsonFile);

// Convertir le JSON en tableau PHP
$reservations = json_decode($jsonData, true);

// Vérifier si des réservations existent
if (is_array($reservations) && count($reservations) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Prénom</th><th>Nom</th><th>Email</th><th>Date de réservation</th><th>Adresse</th><th>ID Playlist</th></tr>";

    // Afficher chaque réservation
    foreach ($reservations as $reservation) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($reservation["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["client"]["prenom"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["client"]["nom"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["client"]["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["date"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["adresse"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["id_playlist"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucune réservation trouvée.";
}
?>
