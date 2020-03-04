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
                    }
                    else
                    {
                        ?>
                        <h1>Borne</h1><br/><br/>
                        <div class="row" style = "width:100%">
                        <?php
                    }
                    $type = $_POST['type'];
                    $c = new Article();
                    $c->getAllArticleByType($type,$bdd);
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