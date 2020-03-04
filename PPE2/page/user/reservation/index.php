
<div id="reservation" class="reservations">
	<?php
		if(isset($_POST["debut"] , $_POST["fin"]) && $_POST["debut"] != null && $_POST["fin"] != null)
		{
			$brd = new Borne();
			$brd->resaBorne($_SESSION['id'],$_GET["id"],$_POST["debut"],$_POST["fin"],$bdd);
			echo "votre demande de reservation a bien étais pris en compte";
		}
	?>
	<form method="POST" action="">
		Debut de la resa <br/>
		<input type="date" name="debut"/><br/>
		Fin de la resa<br/>
		<input type="date" name="fin"/><br/>
		<button type="submit">Valider</button><br/>
	</form>
</div>

	
