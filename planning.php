<?php 
session_start();
$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
$requete = "SELECT login, titre, description, DATE_FORMAT(debut, \"%T\"), debut, DATE_FORMAT(fin, \"%T\"), fin, DATE_FORMAT(debut, \"%W\") FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);
var_dump($resultat);
?>

<!DOCTYPE html>

<html>

<head>
    <title>Reservation Salles</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php include("header.php"); ?>
    <main>
        <section>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("tableau.php");
                    ?>