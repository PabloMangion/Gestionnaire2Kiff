<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button {
            padding: 10px 15px;
            margin-left: 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Accueil</h1>

<h2>
    Liste des réservations
    <a href="components/form.php" class="button">Ajouter une réservation</a>
</h2>

<?php
    // Inclure le fichier reservations.php
    include 'components/reservations_list.php';
?>


<h2>
    Liste des playlists
</h2>

<?php
    // Inclure le fichier reservations.php
    include 'components/playlists_list.php';
?>

</body>
</html>
