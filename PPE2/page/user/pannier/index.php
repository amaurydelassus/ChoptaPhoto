<?php
if(isset($_SESSION["login"]) && $_SESSION['login'] != "")
{
	$erreur = false;
	$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
	if($action !== null)
	{
	if(!in_array($action,array('ajout', 'suppression', 'refresh')))
	$erreur=true;

	//récuperation des variables en POST ou GET
	$id = (isset($_POST['id'])? $_POST['id']:  (isset($_GET['id'])? $_GET['id']:null )) ;
	$l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
	$p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
	$q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

	//Suppression des espaces verticaux
	$l = preg_replace('#\v#', '',$l);
	//On verifie que $p soit un float
	$p = floatval($p);

	//On traite $q qui peut etre un entier simple ou un tableau d'entier
		
	if (is_array($q)){
		$QteArticle = array();
		$i=0;
		foreach ($q as $contenu){
			$QteArticle[$i++] = intval($contenu);
		}
	}
	else
		$q = intval($q);
	}
	if (!$erreur){
		switch($action){
			Case "ajout":
				ajouterArticle($id,$l,$q,$p);
				break;

			Case "suppression":
				supprimerArticle($l);
				break;

			Case "refresh" :
				for ($i = 0 ; $i < count($QteArticle) ; $i++)
				{
					modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
				}
				break;

			Default:
				break;
		}
	}
	?>
	<div class="container-fluid">
		<div class="cadre">
				<form method="post" action="index.php?page=panier">
				<h1>Votre panier</h1>
					<?php
					if (creationPanier())
					{
					$nbArticles=count($_SESSION['panier']['libelleProduit']);
					if ($nbArticles <= 0)
					echo "<h2>Votre panier est vide </h2>";
					else
					{						
						echo "<table id='t01'>";
						echo '<tr>';
						echo '	<th>id</th>';
						echo '	<th>Libellé</th>';
						echo '	<th>Quantité</th>';
						echo '	<th>Prix Unitaire</th>';
						echo '	<th>Action</th>';
						echo '</tr>';
						for ($i=0 ;$i < $nbArticles ; $i++)
						{

							echo "<tr>";
							echo "<td>".htmlspecialchars($_SESSION['panier']['id'][$i])."</ td>";
							echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
							echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
							echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
							echo "<td><a href=\"".htmlspecialchars("index.php?page=panier&action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">Suprimer</a></td>";
							echo "</tr>";
						}

						echo "<tr><td colspan=\"2\"> </td>";
						echo "<td colspan=\"2\">";
						echo "Total : ".MontantGlobal();
						echo "</td></tr>";

						echo "<tr><td colspan=\"4\">";
						echo "<input type=\"submit\" value=\"Rafraichir\"/>";
						echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
						echo "</td></tr>";
						echo "</table><br/><br/>";				
						echo '<div class="d-flex justify-content-center">';
						echo '<a class="btn btn-primary" href="index.php?page=commandeencour&verrou=true">Commander</a>';
						echo '</div>';
					}
					}
					?>

				</form>
		</div>
	</div>
	<?php
}
else
{
	goHome();
}
