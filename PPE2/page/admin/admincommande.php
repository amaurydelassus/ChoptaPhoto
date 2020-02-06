<?php
if (isset($_SESSION["type"]) && $_SESSION['type'] == "1"){?>
    <section>
        <?php
            $c = new Commande();
            $c->getAllCommande($bdd);
        ?>
    </section>
    <?php
}
else{
    include("page/acceuil.php");
}