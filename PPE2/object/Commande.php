<?php
    class Commande extends ArticleCommander
    {
        private     $id;
        private     $idUser;
        private     $dateCommande;
        private     $dateEnvoie;

        public function __construct($idUser=null, $dateCommande=null, $dateEnvoie=null)
        {
            $this->setId(-1);
            $this->setIdUser($idUser);
            $this->setDateCommande($dateCommande);
            $this->setDateEnvoie($dateEnvoie);
        }
        //GET & SET

            public function getId()
            {
                    return $this->id;
            }
            public function setId($id)
            {
                    $this->id = $id;

                    return $this;
            }
            public function getDateCommande()
            {
                        return $this->dateCommande;
            }
            public function setDateCommande($dateCommande)
            {
                        $this->dateCommande = $dateCommande;

                        return $this;
            }
            public function getDateEnvoie()
            {
                    return $this->dateEnvoie;
            }
            public function setDateEnvoie($dateEnvoie)
            {
                    $this->dateEnvoie = $dateEnvoie;

                    return $this;
            }
            public function getIdUser()
            {
                    return $this->idUser;
            }
            public function setIdUser($idUser)
            {
                    $this->idUser = $idUser;

                    return $this;
            }
        //Creation commande
            public function setCommande($bdd)
            {
                $date = date('Y-m-d');
                $req = 'INSERT INTO `commande` (`id_user`,`date_de_commande`) VALUES ("'.$this->idUser.'","'.$date.'")';
                $bdd->executer($req);
                $id = $bdd->dbo->lastInsertId();
                return $id;
            }
        //Affichage des commande d'un utilisateur
            public function getMesCommande($idUser,$bdd)
            {
                echo '<div class="container-fluid">';
                $oRes = $bdd->executer("SELECT * FROM commande WHERE id_user LIKE $idUser");
                while($Commande = $oRes->fetch())
                {
                    $this->setId($Commande->id); 
                    $this->setDateCommande($Commande->date_de_commande);
                    ?>
                    <div class="cadre">
                        <table id='t01'>
                            <tr>
                                <th> N° : <?php echo $this->getId(); ?> </th>           
                                <th> <?php echo $this->getDateCommande(); ?> </th>
                            </tr>
                            <!-- Recuperation de article de la commande -->
                                <?php
                                $AC = new ArticleCommander;
                                $AC->getArticlesByCommande($this->getId(),$bdd);
                                ?>
                        </table>
                    </div>
                    <?php
                }
            }
        //Affichage les commandes pour admin
            public function getAllCommande($bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM commande");
                while($Commande = $oRes->fetch())
                {
                $this->setId($Commande->id); 
                $this->setDateCommande($Commande->date_de_commande);
                ?>
                <div class="cadre">
                    <table id='t01'>
                        <tr>
                            <th> N° : <?php echo $this->getId(); ?> </th>           
                            <th> <?php echo $this->getDateCommande(); ?> </th>
                        </tr>
                        <!-- Recuperation de article de la commande -->
                            <?php
                                $AC = new ArticleCommander;
                                $AC->getArticlesByCommande($this->getId(),$bdd);
                            ?>
                    </table>
                </div>
                <?php
                }
            }
        // Ajouter tout les article du pannier
            public function setPannier($idUser,$pannier,$bdd)
            {
                //creation de la commande et récuperation de l'id
                    $com = new Commande($idUser);
                    $id = $com->setCommande($bdd);
                // ajout des ligne du pannier
                    $nbArticles=count($pannier['libelleProduit']);
                    for ($i=0 ;$i < $nbArticles ; $i++)
                    {
                            $ref = $pannier['id'][$i];
                            $qtt = $pannier['qteProduit'][$i];
                            $AC = new ArticleCommander($id, $ref, $qtt);
                            $AC->setArticleCommander($bdd);
                    }

            }
        
    }
    class ArticleCommander extends Article
    {
        private     $idCommande;
        private     $idArticle;
        private     $qtt;
        // Get and Set
            public function getIdCommande()
            {
                    return $this->idCommande;
            } 
            public function setIdCommande($idCommande)
            {
                    $this->idCommande = $idCommande;
                    return $this;
            }
            public function getIdArticle()
            {
                    return $this->idArticle;
            } 
            public function setIdArticle($idArticle)
            {
                    $this->idArticle = $idArticle;
                    return $this;
            }
            public function getQtt()
            {
                    return $this->qtt;
            }
            public function setQtt($qtt)
            {
                    $this->qtt = $qtt;
                    return $this;
            }
        
        // Constructeur
            public function __construct($idCommande=null, $idArticle=null, $qtt=null)
            {
                $this->idCommande=$idCommande;
                $this->idArticle=$idArticle;
                $this->qtt=$qtt;
            }

        // Ajout d'article a une commande
            public function setArticleCommander($bdd)
            {
                $req = 'INSERT INTO `article_commande` (`id_commande`, `id_article`, `qtt`) VALUES ("'.$this->idCommande.'", "'.$this->idArticle.'","'.$this->qtt.'");';
                $bdd->executer($req);
            }
        // Affichage des article d'une commande
            public function getArticlesByCommande($idCommande,$bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM article_commande WHERE id_commande LIKE $idCommande");
                while($Article = $oRes->fetch())
                {
                    $this->setIdArticle($Article->id_article);
                    $this->setQtt($Article->qtt);
                    echo '<tr> ';
                    $id = $this->getIdArticle();
                    $a = new Article;
                    $A = $a->getInfoArticleById($id,$bdd);
                    ?>
                      <td><img src="<?php echo $A["Image"]?>"/><?php echo $A["Image"]?></td>
                      <td>
                        Ref: <?php echo $this->getIdArticle();?><br/>
                        Nom: <?php echo $A['Nom']?><br/>
                        Quantiter: <?php echo  $this->getQtt() ?><br/>
                        <div class="col-md-3 Article" onclick='location.href="index.php?page=article&id=<?php echo $this->getIdArticle()?>"'>
                            Commander a nouveau
                        </div>
                      </td>
                    </tr>
                    <?php
                }
            }
    }
?>