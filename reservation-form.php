<?php 
session_start();

if ( isset($_POST['fsendevent']) == true && isset($_POST['fdescevent']) && strlen($_POST['fdescevent']) >= 2 ) {
    $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");

    $requete = "SELECT id FROM utilisateurs WHERE login ='".$_SESSION['login']."' ";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);

    $title = $_POST['ftitleevent'];
    $desc = $_POST['fdescevent'];
    $redesc = addslashes($desc);
    $debut = date( 'Y-m-d', strtotime($_POST['fdateeventstart']) )." ".date( 'H:i:s', strtotime($_POST['ftimeeventstart']) );
    $fin = date( 'Y-m-d', strtotime($_POST['fdateeventend']) )." ".date( 'H:i:s', strtotime($_POST['ftimeeventend']) );
    $iduser = $resultat[0][0];
    $requete2 = "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('$title', '$redesc', $debut, $fin, $iduser)";
    $query2 = mysqli_query($connexion, $requete2);
    echo $requete2;
}

elseif ( isset($_POST['envoyer']) == true && isset($_POST['message']) && strlen($_POST['message']) < 2 ) {
        $is2car = true;
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
        <section>
            <?php
            if ( isset($_SESSION['login']) ) {
            ?>
            <form method="post" action="reservation-form.php">
                <input id="ftitleevent" type="text" name="ftitleevent">
                <textarea name="fdescevent" id="fdescevent" cols="30" rows="10"></textarea>
                <input type="date" name="fdateeventstart">
                <input type="time" name="ftimeeventstart" min="08:00" max="18:00" step="3600">
                <input type="date" name="fdateeventend">
                <input type="time" name="ftimeeventend" min="09:00" max="19:00" step="3600">
                <input type="submit" value="Envoyer" name="fsendevent">
            </form>
            <?php
            }