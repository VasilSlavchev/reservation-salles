<footer>
		<section id="containerfooter">
			<section id="cfooterlogo">
				<article id="footerlogo">
					<img height=60 width=200 src="img/logo-maussane.png">
				</article>
			</section>
			<section id="cfooterpres">
				<article id="footerpres">
					<img height=70 width=175 src="img\logobdr.png">
				</article>
				<article id="footerpres">
					<img height=90 width=175 src="img\logopaca.png">
				</article>
			</section>
			<section id="cfootermenu">
				<article id="footermenu">
					<article id="titremenu">
						Navigation
					</article>
					<ul>
                    <nav>
                        <a href="index.php"><li>Accueil</li></a>
                        <?php if(!isset($_SESSION['login'])){ ?>
                        <a href="inscription.php"><li>Inscription</li></a>
                        <a href="connexion.php"><li>Connexion</li></a>
                        <?php } if(isset($_SESSION['login'])){ ?>
                        <a href="profil.php"><li>Mon compte</li></a>
                        <?php } ?>
                        <a href="planning.php"><li>Planning</li></a>
                    </nav>
					</ul>
				</article>
			</section>
			<section id="cfooterreseaux">
				<section id="footerreseaux">
					<article id="tableaufooter">
						<table>
							<tbody>
								<tr>
									<td><img src="img/adresse.png"></td>
									<td>Avenue des Alpilles<br />
									13520 Maussane-les-Alpilles</td>
								</tr>
								<tr>
									<td><img src="img/tel.png"></td>
									<td>+33 (0) 4 90 54 23 13</td>
								</tr>
								<tr>
									<td><img src="img/mail.png"></td>
									<td>tourisme@maussane.com</td>
								</tr>
							</tbody>
						</table>
					</article>
					<section id="boutonreseaux">
						<article id="footertwitter">
						</article>
						<article id="footeryoutube">
						</article>
						<article id="footerfacebook">
						</article>
					</section>
				</section>
			</section>
		</section>
		<section id="containercopyright">
			<article id="copyright">
				Copyright 2019 - La Plateforme | Designed Nicolas
		</section>
	</footer>
