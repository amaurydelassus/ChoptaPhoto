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
                $c = new Borne();
                $borne = $c->getInfoBorneById($id,$bdd);
                ?>
                <div class="Article" id=<?php echo $borne['id']; ?>>
                <p id="title"><?php echo $borne['Nom']?><br/></p><br>
                <img src="img/<?php echo $borne['Image']?>"/></a><br/>
                <p><?php echo $borne['Prix']?>€<br/></p>
                <?php
                    if(isset($_GET["reservation"]) && ($_GET["reservation"]) == "on")
                    {
                        include("page/user/reservation/index.php");
                    }
                    else
                    {
                        ?>
                            <p><a href="index.php?page=borne&amp;id=<?php echo $borne['id']?>&amp;reservation=on">Reserver</a></p>
                        <?php 
                    }
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