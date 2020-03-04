<?php
    class Article
    {   
        private     $id;
        private     $idType;
        private     $ref;
        private     $nom;
        private     $prix;
        private     $description;
        private     $stoque;
        private     $image;

        //Constructeur
            public function __construct($idType=null, $ref=null, $nom=null, $prix=null, $description=null, $stoque=null,$image=null)
            {
                $this->idType=$idType;
                $this->ref=$ref;
                $this->nom=$nom;
                $this->prix=$prix;
                $this->description=$description;
                $this->stoque=$stoque;
                $this->image=$image;

            }
        // GET and SET
            public function getId()
            {
                return $this->id;
            }
            public function setId($id)
            {
                $this->id = $id;

                return $this;
            }

            public function getIdType()
            {
                return $this->idType;
            }
            public function setIdType($idType)
            {
                $this->idType = $idType;

                return $this;
            }

            public function getRef()
            {
                return $this->ref;
            }

            public function setRef($ref)
            {
                $this->ref = $ref;

                return $this;
            }

            public function getNom()
            {
                return $this->nom;
            }

            public function setNom($nom)
            {
                $this->nom = $nom;

                return $this;
            }

            public function getPrix()
            {
                return $this->prix;
            }

            public function setPrix($prix)
            {
                $this->prix = $prix;

                return $this;
            }

            public function getDescription()
            {
                return $this->description;
            }

            public function setDescription($description)
            {
                $this->description = $description;

                return $this;
            }

            public function getStoque()
            {
                return $this->stoque;
            }

            public function setStoque($stoque)
            {
                $this->stoque = $stoque;

                return $this;
            }
            
            public function getImage()
            {
                    return $this->image;
            }
            public function setImage($image)
            {
                    $this->image = $image;

                    return $this;
            }

        //Info Article By ID
            public function getInfoArticleById($id,$bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM article WHERE id LIKE $id");
                while($Article = $oRes->fetch())
                {
                    $this->setIdType($Article->idType); 
                    $this->setRef($Article->id); 
                    $this->setNom($Article->nom); 
                    $this->setPrix($Article->prix);
                    $this->setDescription($Article->description);
                    $this->setStoque($Article->stock);
                    $this->setImage($Article->image_source);              
                    $out['id']          = $this->getRef();
                    $out['Nom']         = $this->getNom();
                    $out['Prix']        = $this->getPrix();
                    $out['Description'] = $this->getDescription();
                    $out['Stoque']      = $this->getStoque();
                    $out['Image']       = $this->getImage();
                    $out['Type']        = $this->getIdType();
                    return $out;
                }
            }
        //Affichage d'un article by article
            public function getArticle($id,$bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM article WHERE id LIKE $id");
                while($Article = $oRes->fetch())
                {
                    $this->setIdType($Article->idType); 
                    $this->setRef($Article->id); 
                    $this->setNom($Article->nom); 
                    $this->setPrix($Article->prix);
                    $this->setDescription($Article->description);
                    $this->setStoque($Article->stock);
                    $this->setImage($Article->image_source);
                    ?>
                    <div class="Article" id=<?php echo $this->getRef(); ?>>
                        <p id="title"><?php echo $this->getNom(); ?><br/></p><br>
                        <img src="<?php echo $this->getImage(); ?>"/></a><br/>
                        <p><?php echo $this->getPrix(); ?>€<br/></p>
                        <p>Encore <?php echo $this->getStoque(); ?> en stock<br/></p>
                            
                        <?php
                            if($this->getIdType() == 1){
                                echo '<a href="index.php?page=panier&action=ajout&amp;id='.$this->getRef().'&amp;l='. $this->getNom().'&amp;q=1&amp;p='.$this->getPrix().'">Ajouter au panier</a>';
                            }
                            else
                            {
                            ?>
                                <p><a href="index.php?page=reservation?id=<?php $_GET['id']?>">Reserver</a></p>
                            <?php
                            }
                        ?>
                    </div>
                    <?php
                }
            }

        //Affichage tout les articles
            public function getAllArticle($bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM article");
                while($Article = $oRes->fetch())
                {
                    $this->setRef($Article->id); 
                    $this->setNom($Article->nom); 
                    $this->setPrix($Article->prix);
                    $this->setDescription($Article->description);
                    $this->setStoque($Article->stock);
                    $this->setImage($Article->image_source);
                ?>
                    <div class="Article" id=<?php echo $this->getRef(); ?>>

                        ------------------------------------ <br/>
                        Image : <img src="<?php echo $this->getImage(); ?>"/></a><br/>
                        Ref : <?php echo $this->getRef(); ?><br/>
                        Titre : <?php echo $this->getNom(); ?><br/>
                        prix : <?php echo $this->getPrix(); ?><br/>
                        stoque :<?php echo $this->getStoque(); ?><br/>

                        ------------------------------------ <br>
                    </div>
                <?php
                }
            }
        //Affichage des article par type
            public function getAllArticleByType($idType,$bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM article WHERE idType LIKE $idType");
                while($Article = $oRes->fetch())
                {
                    $this->setIdType($Article->idType); 
                    $this->setRef($Article->id); 
                    $this->setNom($Article->nom); 
                    $this->setPrix($Article->prix);
                    $this->setDescription($Article->description);
                    $this->setStoque($Article->stock);
                    $this->setImage($Article->image_source);
                ?>
                    <div class="col-md-3 Article" onclick='location.href="index.php?page=article&id=<?php echo $this->getRef()?>"'>
                            ------------------------------------ <br/>
                            <img src="<?php echo $this->getImage(); ?>"/></a><br/>
                            Ref : <?php echo $this->getRef(); ?><br/>
                            Titre : <?php echo $this->getNom(); ?><br/>
                            prix : <?php echo $this->getPrix(); ?><br/>
                            stock :<?php echo $this->getStoque(); ?><br/>

                            ------------------------------------ <br>
                    </div>
                    
                <?php
                }
            }
            public function getAllBorneName($bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM article WHERE idType LIKE 2");
                while($Article = $oRes->fetch())
                {
                    $this->setIdType($Article->idType); 
                    $this->setRef($Article->id); 
                    $this->setNom($Article->nom); 
                    $this->setPrix($Article->prix);
                ?>
                    <option value="<?php echo $this->getRef();?>"><?php echo $this->getNom();?></option>
                <?php
                }
            }
        //Affichage tout les articles commande
            public function getAllArticleCommande($bdd)
            {
                $oRes1 = $bdd->executer("SELECT COUNT(*)as total FROM article_commande WHERE 1");
                while($total = $oRes1->fetch())
                {
                    echo "il y a ".$total->total." commande passé.";
                }
                $oRes2 = $bdd->executer("SELECT * FROM article_commande");
                while($total = $oRes2->fetch())
                {
                    
                }
            }
    }
?>