<?php
if(isset($_SESSION["login"]) && $_SESSION['login'] != "")
{
	?>
	<div class="container-fluid">
		<div class="cadre">
			<h1>Récapitulatif de la commande</h1>
			<?php
			if (isset($_GET['verrou']))
			{
				if($_GET['verrou'] == true)
				{
					if (creationPanier())
					{
						$nbArticles=count($_SESSION['panier']['libelleProduit']);
						if ($nbArticles <= 0)
						echo "<tr><td>Votre panier est vide </ td></tr>";
						else
						{
							echo "<table id='t01'>";
							echo '<tr>';
							echo '	<th>Ref</th>';
							echo '	<th>Libellé</th>';
							echo '	<th>Quantité</th>';
							echo '	<th>Prix Unitaire</th>';
							echo '</tr>';
							for ($i=0 ;$i < $nbArticles ; $i++)
							{
								echo "<tr>";
									echo "<td>".htmlspecialchars($_SESSION['panier']['id'][$i])."</ td></br>";
									echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td></br>";
									echo "<td>Qtt : ".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."</td></br>";
									echo "<td>prix U : ".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td></br>";
								echo "</tr></br>";
							}
							echo "<tr><td colspan=\"2\"> </td>";
							echo "<td colspan=\"2\">";
							echo "Total : ".MontantGlobal();
							echo "</td></tr>";
							echo "</table><br/><br/>";
							echo "</table><br/><br/>";				
							echo '<div class="d-flex justify-content-center">';
							echo '<form action="" method="POST">';
							echo '<button type="submit" class="btn btn-primary" name="paye" value=true>Payer la commande</button>';
							echo '</form>';
							echo '</div>';
						?>
						<?php
							if(isset($_POST['paye']) && $_POST['paye'] == 'true')
							{	
								$cmd = new Commande();
								$cmd->setPannier($_SESSION['id'],$_SESSION['panier'],$bdd);
								supprimePanier();
								?>
									<script>document.location.href="index.php"</script>
								<?php
							}
						}
					}
				}
			}

			?>
		</div>
	</div>
<?php
}
else
{
    goHome();
}