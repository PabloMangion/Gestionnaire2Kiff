<?php
// Chemin vers le fichier JSON des réservations
$reservationsFile = '../data/reservations.json';

// Vérifier si le fichier des réservations existe
if (!file_exists($reservationsFile)) {
    die("Le fichier JSON des réservations n'existe pas.");
}

// Lire le contenu du fichier JSON des réservations
$reservationsData = file_get_contents($reservationsFile);
$reservations = json_decode($reservationsData, true);

// Mettre à jour les réservations avec les nouvelles playlists
foreach ($reservations as &$reservation) {
    $playlistKey = 'playlist_id_' . $reservation['id'];
    if (isset($_POST[$playlistKey])) {
        $reservation['id_playlist'] = $_POST[$playlistKey];
    }
}

// Convertir le tableau PHP en JSON
$newReservationsData = json_encode($reservations, JSON_PRETTY_PRINT);

// Écrire les données mises à jour dans le fichier JSON
file_put_contents($reservationsFile, $newReservationsData);

// Rediriger vers la page précédente ou afficher un message de succès
header("Location: ../index.php");
exit;
?>
