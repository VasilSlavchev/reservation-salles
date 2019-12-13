<?php

session_start();
$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");

if ( isset($_GET["id"]) ) {
    $idevent = $_GET["id"];
    $intidevent = intval($idevent);
    $requete1 = "SELECT * FROM reservations WHERE id=$intidevent";
    $query1 = mysqli_query($connexion, $requete1);
    $resultat = mysqli_fetch_all($query1);
    $iduser = intval($resultat[0][5]);
    $requete2 = "SELECT login FROM utilisateurs WHERE id=$iduser";
    $query2 = mysqli_query($connexion, $requete2);
    $resultat2 = mysqli_fetch_all($query2);
    $datesqldebut = $resultat[0][3];
    $newdatedebut = date('d-m-Y à H:i:s', strtotime($datesqldebut));
    $datesqlfin = $resultat[0][4];
    $newdatefin = date('d-m-Y à H:i:s', strtotime($datesqlfin));
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Réservation Salles - Evènement</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include("header.php"); ?>
    <main>
        <section class="cmid cform">
            <?php
            if ( isset($_SESSION['login']) ) {
            ?>
            <section id="cevent">
                <img src="img/calendrier.png">
                <article id="ctitleevent">
                    <p>Evènement <?php echo $resultat[0][1]; ?></p>
                </article>
                <article id="cdescevent">
                    <p><?php echo $resultat[0][2]; ?></p>
                </article>
                <article id="cdatedebut">
                    <p>Début de l'évènement le <i><?php echo $newdatedebut; ?></i></p>
                </article>
                <article id="cdatefin">
                    <p>Fin de l'évènement le <i><?php echo $newdatefin; ?></i></p>
                </article>
                <article id="corganisateur">
                    <p>Organisé par <?php echo "<b>".$resultat2[0][0]."</b>"; ?></p>
                </article>
            </section>
            <?php
            }
            else {
                echo "<p>Vous devez être connecté pour accéder à cette page.</p>";
            }
            ?>
        </section>
    </main>
    <?php include("footer.php"); ?>
</body>
</html>