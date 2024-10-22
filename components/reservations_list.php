<?php
// Chemin vers le fichier JSON des réservations
$reservationsFile = 'data/reservations.json';

// Vérifier si le fichier des réservations existe
if (!file_exists($reservationsFile)) {
    die("Le fichier JSON des réservations n'existe pas.");
}

// Lire le contenu du fichier JSON des réservations
$reservationsData = file_get_contents($reservationsFile);
$reservations = json_decode($reservationsData, true);

// Chemin vers le fichier JSON des playlists
$playlistsFile = 'data/playlists.json';

// Vérifier si le fichier des playlists existe
if (!file_exists($playlistsFile)) {
    die("Le fichier JSON des playlists n'existe pas.");
}

// Lire le contenu du fichier JSON des playlists
$playlistsData = file_get_contents($playlistsFile);
$playlists = json_decode($playlistsData, true);

// Vérifier si des réservations existent
if (is_array($reservations) && count($reservations) > 0) {
    echo "<form method='POST' action='./service/update_reservations.php'>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Prénom</th><th>Nom</th><th>Email</th><th>Date de réservation</th><th>Adresse</th><th>Modifier Playlist</th></tr>";

    // Afficher chaque réservation
    foreach ($reservations as $reservation) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($reservation["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["client"]["prenom"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["client"]["nom"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["client"]["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["date"]) . "</td>";
        echo "<td>" . htmlspecialchars($reservation["adresse"]) . "</td>";

        // Afficher la liste déroulante pour les playlists
        echo "<td>";
        echo "<select name='playlist_id_" . htmlspecialchars($reservation["id"]) . "'>";
        foreach ($playlists as $playlist) {
            $selected = ($playlist['id'] == $reservation['id_playlist']) ? 'selected' : '';
            echo "<option value='" . htmlspecialchars($playlist['id']) . "' $selected>" . htmlspecialchars($playlist['nom']) . "</option>";
        }
        echo "</select>";
        echo "</td>";
        
        echo "</tr>";
    }
    echo "</table>";
    echo "<input type='submit' class='button update-button' value='Valider les modifications'>";
    echo "</form>";
} else {
    echo "Aucune réservation trouvée.";
}
?>

<style>

.update-button{
    margin-top : 20px;
}

</style>
