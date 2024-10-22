<?php
// Chemin du fichier JSON
$file = '../data/reservations.json';

// Fonction pour ajouter une réservation au fichier JSON
function ajouterReservation($data) {
    global $file;

    // Vérifie si le fichier JSON existe
    if (file_exists($file)) {
        // Récupère les données existantes
        $current_data = file_get_contents($file);
        $array_data = json_decode($current_data, true);
    } else {
        // Si le fichier n'existe pas, initialise un tableau vide
        $array_data = [];
    }

    // Ajoute la nouvelle réservation
    array_push($array_data, $data);

    // Sauvegarde le tableau mis à jour dans le fichier JSON
    $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
    file_put_contents($file, $final_data);
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $adresse = $_POST['adresse'];
    $id_playlist = $_POST['id_playlist'];

    // Structure des données à ajouter
    $new_reservation = [
        "id" => time(),  // Utilisation de time() pour générer un ID unique
        "client" => [
            "prenom" => $prenom,
            "nom" => $nom,
            "email" => $email
        ],
        "date" => $date,
        "adresse" => $adresse,
        "id_playlist" => (int)$id_playlist
    ];

    // Ajoute la réservation au fichier JSON
    ajouterReservation($new_reservation);

    echo "Réservation ajoutée avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation - DJ Marcel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input[type="text"], input[type="email"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            margin-top: 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Réservez une soirée avec DJ Marcel</h2>
    <form action="./form.php" method="POST">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="date">Date de la soirée</label>
        <input type="date" id="date" name="date" required>

        <label for="adresse">Adresse de l'événement</label>
        <input type="text" id="adresse" name="adresse" required>

        <label for="id_playlist">ID de la playlist</label>
        <input type="number" id="id_playlist" name="id_playlist" required>

        <button type="submit">Réserver</button>
    </form>
</div>

</body>
</html>
