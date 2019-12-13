<?php
session_start();
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
        <section class="cmid formimg">
            <?php
            if (isset($_SESSION['login']))
            {
                $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
                $requete = "SELECT * FROM utilisateurs WHERE login='" . $_SESSION['login'] . "'";
                $query = mysqli_query($connexion, $requete);
                $resultat = mysqli_fetch_assoc($query);

                ?>
                <section class="left">
                    <img src="img/petanque.png">
                </section>
                <section class="mid cpageform">
                    <article class="titleform">
                        <p>Mon compte</p>
                    </article>
                        <form action="profil.php" method="post">
                            <section class="cform">
                                <label>Identifiant</label>
                                <input type="text" name="login" value=<?php echo $resultat['login']; ?> />
                                <label>Mot de passe</label>
                                <input type="password" name="passwordx" />
                                <label>Confirmation du mot de passe</label>
                                <input type="password" name="passwordconf" />
                                <input name="ID" type="hidden" value=<?php echo $resultat['id']; ?> />
                                <input type="submit" name="modifier" value="Modifier" />
                            </section>
                        </form>

                        <?php 
                            if (isset($_POST['modifier']) ) 
                            {
                                if ($_POST["passwordx"] != $_POST["passwordconf"]) 
                                {
                                    ?>
                                    <p class="pincorrect">Attention ! Mot de passe différents</p>
                                <?php
                                } 
                                elseif(isset($_POST['passwordx']) && !empty($_POST['passwordx'])){
                                    $pwdx = password_hash($_POST['passwordx'], PASSWORD_BCRYPT, array('cost' => 12));
                                    $updatepwd = "UPDATE utilisateurs SET password = '$pwdx' WHERE id = '" . $resultat['id'] . "'";
                                    $query2 = mysqli_query($connexion, $updatepwd);
                                    header('Location:profil.php');
                                }
                                $login = $_POST["login"];
                                $req = "SELECT login FROM utilisateurs WHERE login = '$login'";
                                $req3 = mysqli_query($connexion, $req);
                                $veriflog = mysqli_fetch_all($req3);
                                    if(!empty($veriflog))
                                    {
                                        ?>
                                        <p class="pincorrect">Login deja utilisé, requete refusé.<br /></p>
                                        <?php
                                    }
                                if(empty($veriflog))
                                    {
                                        $updatelog = "UPDATE utilisateurs SET login ='" . $_POST['login'] . "' WHERE id = '" . $resultat['id'] . "'";
                                        $querylog = mysqli_query($connexion, $updatelog);
                                        $_SESSION['login']=$_POST['login'];
                                        header("Location:profil.php");
                                    }
                            }
                            ?>
                        </section>
                        <section class="right">
                            <img src="img/taureau.png">
                        </section>
        </section>
    <?php

    } 
    else 
    {
        ?>
            <p>Veuillez vous connecter pour accéder à votre page !</p>
        <?php
    }
    ?>

    </main>
    <?php include("footer.php"); ?>
</body>

</html>