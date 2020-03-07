<section id="article">
<?php
if(isset($_SESSION["login"]) && $_SESSION['login'] != "")
{
    echo '<div class="container-fluid">';
        echo'<div class="cadre">';
            if(!isset($_GET["id"]))
                echo "Erreur article";
            else
            {
                $id = $_GET['id'];
                $c = new Article();
                $article = $c->getInfoArticleById($id,$bdd);
                ?>
                <div class="Article" id=<?php echo $article['id']; ?>>
                <p id="title"><?php echo $article['Nom']; ?><br/></p><br>
                <img src="<?php echo $article['Image']; ?>"/></a><br/>
                <p><?php echo $article['Prix']; ?>€<br/></p>
                <p>Encore <?php echo $article['Stoque']; ?> en stock<br/></p> 
                <?php
                echo '<a href="index.php?page=panier&action=ajout&amp;id='.$article['id'].'&amp;l='. $article['Nom'].'&amp;q=1&amp;p='.$article['Prix'].'">Ajouter au panier</a>';
            }
        echo '</div>';
    echo '</div>';
}
else
{
    goHome();
}
?>
</section>