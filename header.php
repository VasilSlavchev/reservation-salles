<header>
        <nav>
            <section id="clogoheader">
                <section>
                    <a id="navlogo" href="index.php"><img height=60 width=200 src="img/logo-maussane.png"></a>
                </section>
            </section>
            <section id="cnavbtn">
                <a class="btnnav" href="index.php"><section>
                    <p>Accueil</p>
                </section></a>
                <a class="btnnav" href="planning.php"><section>
                    <p>Planning</p>
                </section></a>
                <?php if( !isset($_SESSION['login']) ){ ?>
                <a class="btnnav" href="inscription.php"><section>
                    <p>Inscription</p>
                </section></a>
                <a class="btnnav" href="connexion.php"><section>
                    <p>Connexion</p>
                </section></a>
                <?php } if( isset($_SESSION['login']) ){ ?>
                <a href="profil.php" class="btnnav"><section>
                    <p>Mon compte</p>
                </section></a>
                <a href="index.php" class="btnnav"><section>
                    <form action="index.php" method="get">
                        <input type="submit" name="deco" value="Déconnexion" />
                    </form>
                </section></a>
            </section>
            <?php } ?>
        </nav>
    </header>
