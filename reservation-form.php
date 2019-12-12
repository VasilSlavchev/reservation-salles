<?php 
session_start();
$eventante = false;
$eventchamp = false;
$eventexist = false;
$eventsup = false;

if ( isset($_POST['fsendevent']) && isset($_POST['ftitleevent']) && strlen($_POST['ftitleevent']) > 0 && isset($_POST['fdescevent']) && strlen($_POST['fdescevent']) > 0 && isset($_POST['fdateeventstart']) && isset($_POST['ftimeeventstart']) && isset($_POST['fdateeventend']) && isset($_POST['ftimeeventend']) ) {
    $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");

    $requete = "SELECT id FROM utilisateurs WHERE login ='".$_SESSION['login']."' ";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);

    $title = $_POST['ftitleevent'];
    $desc = $_POST['fdescevent'];
    $redesc = addslashes($desc);
    $debutcase = $_POST['fdateeventstart']." ".$_POST['ftimeeventstart'];
    $fincase = $_POST['fdateeventend']." ".$_POST['ftimeeventend'];
    $debut = date( "Y-m-d H:i:s", strtotime($debutcase) );
    $fin = date( "Y-m-d H:i:s", strtotime($fincase) );
    $iduser = $resultat[0][0];
    $dateojd = date("Y-m-d H:i:s");
    $requeteiseventexist = "SELECT COUNT(*) FROM reservations WHERE debut >= '$debut' AND fin <= '$fin'";
    $queryiseventexist = mysqli_query($connexion, $requeteiseventexist);
    $resultatiseventexist = mysqli_fetch_all($queryiseventexist);
    $iseventexist = intval($resultatiseventexist[0][0]);
    if ( $debut > $dateojd ) {
        if ( $fin > $debut ) {
            if ( $iseventexist == 0 ) {
                $requete2 = "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('$title', '$redesc', '$debut', '$fin', $iduser)";
                $query2 = mysqli_query($connexion, $requete2);
            }
            else {
                $eventexist = true;
            }
        }
        else {
            $eventsup = true;
        }
    }
    else {
        $eventante = true;
    }
}

elseif ( isset($_POST['fsendevent']) && strlen($_POST['ftitleevent']) == 0 || isset($_POST['fsendevent']) && strlen($_POST['fdescevent']) == 0 || isset($_POST['fsendevent']) && !isset($_POST['fdateeventstart']) || isset($_POST['fsendevent']) && !isset($_POST['ftimeeventstart']) || isset($_POST['fsendevent']) && !isset($_POST['fdateeventend']) || isset($_POST['fsendevent']) && !isset($_POST['ftimeeventend']) ) {
    $connexion = mysqli_connect("localhost", "root", "", "reservationsalles" );
    $eventchamp = true;
}

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
        <section class="cmid cpageform">
            <?php
            if ( isset($_SESSION['login']) ) {
            ?>
            <article class="titleform">
                <p>Création d'évènement</p>
            </article>
            <form method="post" action="reservation-form.php">
                <section class="cform">
                    <label>Titre de l'évènement</label>
                    <input id="ftitleevent" type="text" name="ftitleevent">
                    <label>Description</label>
                    <textarea name="fdescevent" id="fdescevent" cols="30" rows="10"></textarea>
                    <label>Date de début</label>
                    <input type="date" name="fdateeventstart">
                    <label>Heure de début</label>
                    <input type="time" name="ftimeeventstart" min="08:00" max="18:00" step="3600">
                    <label>Date de fin</label>
                    <input type="date" name="fdateeventend">
                    <label>Heure de fin</label>
                    <input type="time" name="ftimeeventend" min="09:00" max="19:00" step="3600">
                    <input type="submit" value="Envoyer" name="fsendevent">
                </section>
            </form>
            <?php
                if ( $eventsup == true ) {
                    ?>
                    <p class="pincorrect">La date de fin de votre évènement doit être supérieure à sa date de début.</p>
                    <?php
                }
                if ( $eventexist == true ) {
                    ?>
                    <p class="pincorrect">Un évènement existe déjà !</p>
                    <?php
                }
                if ( $eventchamp == true ) {
                    ?>
                    <p class="pincorrect">Merci de remplir tous les champs.</p>
                    <?php
                }
                if ( $eventante == true ) {
                    ?>
                    <p class="pincorrect">La date de début de votre évènement ne peu pas être inférieure à la date d'ajourd'hui.</p>
                    <?php
                }
            ?>
        </section>
            <?php
            }
            else {
            ?>
                <p>Veuillez vous connecter pour accéder à votre page !</p>
            <?php
            }
        ?>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>