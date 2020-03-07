<div id="reservation" class="reservations">
	<?php
		if(isset($_POST["debut"] , $_POST["fin"]) && $_POST["debut"] != null && $_POST["fin"] != null)
		{
			$brd = new Reservation();
			$brd->resaBorne($_GET["id"],$_POST["Event"],$_SESSION['id'],$_POST["debut"],$_POST["fin"],$bdd);
			echo "votre demande de reservation a bien étais pris en compte";
		}
		if(isset($_POST["ce_create"]) && $_POST["ce_create"] != null)
		{
			$brd = new Reservation();
			$brd->createEvent($_SESSION['id'],$_POST['ce_create'],$bdd);
			echo "votre creation d'event a bien étais pris en compte";
		}
	?>
	<div>
		<form method="POST" action="">
			<div class="form-group">
				<label for="exampleInputEmail1"> Crée un event </label>
				<input class="form-control" type="text" name="ce_create"/><br/>
			</div>
			<button type="submit" class="btn btn-primary">Crée</button>
		</form>
	</div>
	<br>
	<div>
		<form method="POST" action="">
			<div class="form-group">
				<label for="exampleInputEmail1"> Event </label>
				<select name="Event" id="Event">
					<?php
					$brd = new Reservation();
					$brd->selectedEvent($_SESSION['id'],$bdd);
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1"> Debut de la resa </label>
				<input type="date" name="debut"/><br/>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1"> Fin de la resa </label>
				<input type="date" name="fin"/><br/>
			</div>
			<button type="submit" class="btn btn-primary">Réserver</button>
		</form>
	</div>
</div>