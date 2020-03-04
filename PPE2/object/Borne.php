<?php
    class Borne extends ArticleCommander
    {
        private     $id;
        private     $idUser;
        private     $idBorne;
        private     $dateDebut;
        private     $dateFin;

        public function __construct($idUser=null, $idBorne=null, $dateDebut=null, $dateFin=null)
        {
            $this->setId(-1);
            $this->setIdUser($idUser);
            $this->setIdBorne($idBorne);
            $this->setDateDebut($dateDebut);
            $this->setdateFin($dateFin);
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
            public function getDateDebut()
            {
                        return $this->dateDebut;
            }
            public function setDateDebut($dateDebut)
            {
                        $this->dateDebut = $dateDebut;

                        return $this;
            }
            public function getdateFin()
            {
                    return $this->dateFin;
            }
            public function setdateFin($dateFin)
            {
                    $this->dateFin = $dateFin;

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

            public function getIdBorne()
            {
                    return $this->idBorne;
            }

            public function setIdBorne($idBorne)
            {
                    $this->idBorne = $idBorne;

                    return $this;
            }
        //reservation  d'une borne
            public function resaBorne($id_user,$id,$debut,$fin,$bdd)
            {
                $id = $id-3;
                $req = 'INSERT INTO `resa_borne` (`id_user`, `id_borne`, `date_debut`, `date_fin`) VALUES ("'.$id_user.'","'.$id.'","'.$debut.'","'.$fin.'")';
                $bdd->executer($req);
            }
        //Affichage des borne d'un utilisateur
            public function getMesBorne($idUser,$bdd)
            {

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
        }
