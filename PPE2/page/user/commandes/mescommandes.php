<section>
<?php
if(isset($_SESSION["login"]) && $_SESSION['login'] != "")
{
        $c = new Commande();
        $c->getMesCommande($_SESSION['id'],$bdd);
}
else
{
    goHome();
}
?>
</section>