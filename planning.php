<?php 
session_start();
$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
$requete = "SELECT login, titre, description, DATE_FORMAT(debut, \"%T\"), debut, DATE_FORMAT(fin, \"%T\"), fin, DATE_FORMAT(debut, \"%W\") FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);
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
        <section id="ctableau">
            <table>
                <thead>
                    <tr>
                        <th class="cjours"></th>
                        <th class="cjours">Lundi</th>
                        <th class="cjours">Mardi</th>
                        <th class="cjours">Mercredi</th>
                        <th class="cjours">Jeudi</th>
                        <th class="cjours">Vendredi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("tableau.php");
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php include("footer.php"); ?>
</body>
</html>