<?php session_start(); ?>

<!DOCTYPE html>

<html>

<head>
    <title>Reservation Salles - Accueil</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php include("header.php"); ?>
    <main>
        <section class="cmid">
            <section id="indeximg">
                <img width=100% height=400px src="img/indexmaussane.jpg">
            </section>
            <section id="cindex">
                <img id="logomaussane" src="img/logomaussane.jpg">
                <?php
                date_default_timezone_set('Europe/Paris');
                if(isset($_SESSION['login']))
                {
                    ?>
                    <?php
                    echo "<p>Bonjour ".$_SESSION["login"]."</p>";
                    ?>
                    <?php
                    echo "<p>Nous sommes le ".date('d-m-Y')." et il est ".date('H:i:s')."</p>";
                    ?>
                    <p>Vous êtes connecté en tant qu'utilisateur.</p>
                    <p><a href="planning.php">Accéder au planning</a></p>
                    <p><a href="reservation-form.php">Créer un évènement</a></p>
                    <?php
                }
                else
                {
                    ?>
                    <?php
                    echo "<p>Nous sommes le ".date('d-m-Y')." et il est ".date('H:i:s')."</p>";
                    ?>
                    <p>Bienvenue !</p>
                    <p>Pour pouvoir accéder à votre profil veuillez visiter la page : <a href="connexion.php">Connexion</a></p>
                    <p>Pas de compte ? Inscrivez-vous en remplissant le formulaire : <a href="inscription.php">Inscription</a></p>
                <?php
                }
                
                if (isset($_GET["deco"]))
                {
                    session_unset();
                    session_destroy();
                    header('Location:index.php');
                }
                ?>
            </section>
        </section>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>
