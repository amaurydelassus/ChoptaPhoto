<?php
    class Borne extends ArticleCommander
    {
        private     $id_Borne;
        private     $nom;
        private     $prix;
        private     $description;

        public function __construct($id_Borne=null,$nom=null,$prix=null,$descritpion=null)
        {
            $this->setId_Borne($id_Borne);
            $this->setNom($nom);
            $this->setPrix($prix);
            $this->setDescription($descritpion);
        }
        //GET & SET
            public function getDescription()
            {
                    return $this->description;
            }
            public function setDescription($description)
            {
                    $this->description = $description;

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
            public function getNom()
            {
                    return $this->nom;
            }
            public function setNom($nom)
            {
                    $this->nom = $nom;

                    return $this;
            }
            public function getId_Borne()
            {
                    return $this->id_Borne;
            }
            public function setId_Borne($id_Borne)
            {
                    $this->id_Borne = $id_Borne;

                    return $this;
            }
            //Info Article By ID
            public function getInfoBorneById($id,$bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM borne WHERE id_Borne LIKE $id");
                while($Borne = $oRes->fetch())
                {
                    $this->setRef($Borne->id_Borne);
                    $this->setNom($Borne->nom); 
                    $this->setPrix($Borne->prix);
                    $this->setDescription($Borne->description);
                    $this->setImage($Borne->URL);              
                    $out['id']          = $this->getRef();
                    $out['Nom']         = $this->getNom();
                    $out['Prix']        = $this->getPrix();
                    $out['Description'] = $this->getDescription();
                    $out['Stoque']      = $this->getStoque();
                    $out['Image']       = $this->getImage();
                    return $out;
                }
            }
            //Affichage tout les bornes
            public function getAllBorne($bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM borne");
                $i = 0;
                while($Borne = $oRes->fetch())
                {
                    $this->setId_Borne($Borne->id_Borne);
                    $this->setNom($Borne->nom);
                    $this->setPrix($Borne->prix);
                    $this->setDescription($Borne->description);
                    $this->setImage($Borne->URL);
                    $out[$i]['id']          = $this->getId_Borne();
                    $out[$i]['Nom']         = $this->getNom();
                    $out[$i]['Prix']        = $this->getPrix();
                    $out[$i]['Description'] = $this->getDescription();
                    $out[$i]['Image']       = $this->getImage();
                    $i++;
                }
                return $out;
            }
        //Affichage les borne pour admin
            public function getAllResborneById($id,$bdd)
            {
                $oRes = $bdd->executer("SELECT * FROM `resa_borne` WHERE id LIKE $id");
                while($Commande = $oRes->fetch())
                {
                    $this->setId($Commande->id); 
                    $this->setDateCommande($Commande->date_debut);
                    ?>
                    <div class="cadre">
                        <table id='t01'>
                            <tr>
                                <th> N° : <?php echo $this->getId(); ?> </th>
                                <th></th>
                            </tr>
                            <tr>        
                                <td> Users_id : <?php echo $Commande->id_user; ?> </th>           
                                <td> <?php echo $this->getDateCommande(); ?> </th>
                            </tr>
                        </table>
                    </div>
                    <?php
                }
            }
        // tout le nom des borne
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
        }
