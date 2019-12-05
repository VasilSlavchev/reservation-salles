<header>
        <nav>
            <section>
                <a href="index.php">Accueil</a>
            </section>
            <section>
                <a href="topics.php"><span>T</span>opics</a>
            </section>
            <?php if( !isset($_SESSION['login']) ){ ?>
            <section>
                <a href="inscription.php"><span>I</span>nscription</a>
            </section>
            <section>
                <a href="connexion.php"><span>C</span>onnexion</a>
            </section>
            <?php } if( isset($_SESSION['login']) ){ ?>
             <section>
                <a href="profil.php"><span>P</span>rofil</a>
            </section>
            <section>
                <form action="index.php" method="get">
                    <input type="submit" name="deco" value="Déconnexion" />
                </form>
                <a href="index.php?deco"><span>D</span>éconnexion</a>
            </section>
            <?php } ?>
        </nav>
    </header>
