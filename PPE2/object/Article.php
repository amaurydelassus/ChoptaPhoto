<?php
    class Article
    {   
        private     $id;
        private     $ref;
        private     $nom;
        private     $prix;
        private     $description;
        private     $stoque;
        private     $image;

        //Constructeur
            public function __construct($ref=null, $nom=null, $prix=null, $description=null, $stoque=null,$image=null)
            {
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
                $oRes = $bdd->executer("SELECT * FROM article WHERE id_Article LIKE $id");
                while($Article = $oRes->fetch())
                {
                    $this->setRef($Article->id_Article); 
                    $this->setNom($Article->nom); 
                    $this->setPrix($Article->prix);
                    $this->setDescription($Article->description);
                    $this->setStoque($Article->stock);
                    // $this->setImage($Article->image_source);              
                    $out['id']          = $this->getRef();
                    $out['Nom']         = $this->getNom();
                    $out['Prix']        = $this->getPrix();
                    $out['Description'] = $this->getDescription();
                    $out['Stoque']      = $this->getStoque();
                    $out['Image']       = $this->getImage();
                    return $out;
                }
            }
        //Affichage tout les articles
            public function getAllArticle($bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM article");
                $i = 0;
                while($Article = $oRes->fetch())
                {
                    $this->setRef($Article->id_Article); 
                    $this->setNom($Article->nom); 
                    $this->setPrix($Article->prix);
                    $this->setDescription($Article->description);
                    $this->setStoque($Article->stock);
                    // $this->setImage($Article->image_source);
                    $out[$i]['id']          = $this->getRef();
                    $out[$i]['Nom']         = $this->getNom();
                    $out[$i]['Prix']        = $this->getPrix();
                    $out[$i]['Description'] = $this->getDescription();
                    $out[$i]['Stoque']      = $this->getStoque();
                    $out[$i]['Image']       = $this->getImage();
                    $i++;
                }
                return $out;
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