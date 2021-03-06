<?php

    session_start();
    $ismdpwrong = false;
    $isIDinconnu = false;
    $ischampremplis = false;

    if ( isset($_POST['connexion']) == true && isset($_POST['login']) && strlen($_POST['login']) != 0 && isset($_POST['password']) && strlen($_POST['password']) != 0 ) {
        $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
        $requete = "SELECT * FROM utilisateurs WHERE login ='".$_POST['login']."'";
        $query = mysqli_query($connexion, $requete);
        $resultat = mysqli_fetch_all($query);

        if ( !empty($resultat) ) {
            if ( password_verify($_POST['password'], $resultat[0][2]) )
                    {
                        $_SESSION['login'] = $_POST['login'];
                        $_SESSION['password'] = $_POST['password'];
                        header('Location:index.php');
                    }
            else {
                $ismdpwrong = true;
            }
        }
        else {
            $isIDinconnu = true;
        }
        mysqli_close($connexion);
    }
    elseif ( isset($_POST['connexion']) == true && isset($_POST['login']) && strlen($_POST['login']) == 0 || isset($_POST['password']) && strlen($_POST['password']) == 0 ) {
        $ischampremplis = true;
    }

?>

<!DOCTYPE html>

<html>
<head>
    <title>Reservation Salles - Connexion</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php include("header.php"); ?>
    <main>
        <section class="cmid formimg">
                <?php
                if ( !isset($_SESSION['login']) ) {
                    ?>
                <section class="left">
                    <img src="img/lavande.png">
                </section>
                <section class="mid cpageform">
                    <article class="titleform">
                        <p>Connexion</p>
                    </article>
                    <form method="post" action="connexion.php">
                        <section class="cform">
                            <label>Identifiant</label>
                            <input type="text" name="login" ><br />
                            <label>Mot de passe</label>
                            <input type="password" name="password" ><br />
                            <input type="submit" value="Se connecter" name="connexion" >
                        </section>
                    </form>
                    <?php
                    if ( $ismdpwrong == true ) {
                    ?>
                        <p class="pincorrect">Identifiant ou mot de passe incorrect.</p>
                    <?php
                    }
                    elseif ( $isIDinconnu == true ) {
                    ?>
                        <p class="pincorrect">Cet identifiant n'exsite pas.</p>
                    <?php
                    }
                    elseif ( $ischampremplis == true ) {
                    ?>
                        <p class="pincorrect">Merci de remplir tous les champs!</p>
                    <?php
                    }
                    ?>
                    </section>
            <section class="right">
                <img src="img/lavande2.png">
            </section>
                <?php
                }

                elseif ( isset($_SESSION['login']) ) {
                ?>
                    <center><p>ERREUR<br />
                    Vous êtes déjà connecté !</p></center>
                    </section>
                <?php
                }
                ?>
        </section>
    </main>
    <?php include("footer.php"); ?>
</body>
</html>