<section>
	<div class="container" style="top: 3vh;">
		<div class="row">
			<div class="col-sm">
			<?php
				if(isset($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['password'])
						&& $_POST['nom'] != "" 
						&& $_POST['email'] != "" 
						&& $_POST['prenom'] != "" 
						&& $_POST['password'] != ""
					)
				{	
					if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {// on verifie existence de la clé
						$errors ['mail'] = "vous n'avez pas renseigné votre email";
					}
					else
					{
						$usr = new Utilisateur($_POST["email"], $_POST["password"], $_POST["nom"], $_POST["prenom"]);
						$ret = $usr->enregistrer($bdd);
						if($ret == "true")
						{
							?>
								<script>document.location.href="index.php?page=login"</script>
							<?php
						}
						else
						{
							echo $ret;
						}
					}

				}			
			?>
			<div class="wrapper fadeInDown" id="connection">
				<div id="formContent">
					<h1>Register</h1>
					<form action="" method="POST">
						<?php if(array_key_exists('errors',$_SESSION)): ?>
							<div class="alert alert-danger">
								<?= implode('<br>', $_SESSION['errors']); ?>
							</div>
						<?php endif; ?>
						<input type="email" id="login" class="fadeIn second" style="margin-top: 20px;" name="email" placeholder="Email" required>
						<input type="text" id="nom" class="fadeIn second" name="nom" placeholder="Nom" required>
						<input type="text" id="prenom" class="fadeIn second" name="prenom" placeholder="Prenom" required>
						<input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
						<input type="password" id="password" class="fadeIn third" name="password" placeholder="Comfirme Password" required>
						<br/><br/>
						<div class="g-recaptcha" data-sitekey="6LdAULgUAAAAAH--nzuq0IIuUnTRoQOInOR5_EHR"></div>					
						<br/><br/>	
						<button type="submit" class="btn btn-primary">Sign In</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</section>

