<section id="article">
<?php
if(isset($_SESSION["login"]) && $_SESSION['login'] != "")
{
	?>
    <div class="container-fluid">
        <div class="cadre">
                <?php
                if(!isset($_POST["type"]))
                    echo "Pas de type";
                else
                {
                    if($_POST['type'] == 1)
                    {
                        ?>
                        <h1>Consomable</h1><br/><br/>
                        <div class="row" style = "width:100%">
                        <?php
                        $c = new Article();
                        $out = $c->getAllArticle($bdd);
                        foreach($out as $val)
                        {
                            ?>
                            <div class="col-md-3 Article" onclick='location.href="index.php?page=article&id=<?php echo $val["id"]?>"'>
                                ------------------------------------ <br/>
                                Image : <img src="<?php echo $val['Image'] ?>"/></a><br/>
                                Ref : <?php echo $val['id']; ?><br/>
                                Titre : <?php echo $val['Nom']; ?><br/>
                                prix : <?php echo $val['Prix']; ?><br/>
                                stoque :<?php echo $val['Stoque']; ?><br/>
        
                                ------------------------------------ <br>
                            </div>
                            <?php
                        }

                    }
                    else
                    {
                        ?>
                        <h1>Borne</h1><br/><br/>
                        <div class="row" style = "width:100%">
                        <?php
                        $c = new Borne();
                        $out = $c->getAllBorne($bdd);
                        foreach($out as $val){
                            ?>
                            <div class="col-md-3 Article" onclick='location.href="index.php?page=borne&id=<?php echo $val["id"]?>"'>
                                ------------------------------------ <br/>
                                Image : <img src="img/<?php echo $val['Image']?>"/></a><br/>
                                Ref : <?php echo $val['id']?><br/>
                                Titre : <?php echo $val['Nom']?><br/>
                                Prix : <?php echo $val['Prix']?><br/>
                                Description :<?php echo $val['Description']?><br/>
        
                                ------------------------------------ <br>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
else
{
    goHome();
}
?>
</section>