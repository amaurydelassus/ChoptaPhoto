<?php
        class Reservation
        {
        private     $id;
        private     $id_Event;
        private     $idUser;
        private     $idBorne;
        private     $dateDebut;
        private     $dateFin;


        public function __construct($id=null, $id_Event=null,$idUser=null, $idBorne=null, $dateDebut=null, $dateFin=null)
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
                public function getId_Event()
                {
                        return $this->id_Event;
                }

                public function setId_Event($id_Event)
                {
                        $this->id_Event = $id_Event;

                        return $this;
                }
        //reservation  d'une borne
                public function resaBorne($id_Borne,$id_Event,$id_user,$debut,$fin,$bdd)
                {
                $req = 'INSERT INTO `reservation` (`Id_Event`,`id_User`, `id_Borne`, `dateDebut`, `dateFin`) 
                VALUES ("'.$id_Event.'","'.$id_user.'","'.$id_Borne.'","'.$debut.'","'.$fin.'")';
                $bdd->executer($req);
                }
        //create event
                public function createEvent($id_User,$titre,$bdd){
                        $code = substr(strtoupper($titre),0,4);
                        $code = $code.$id_User.date('Y-m-d');
                        $req = 'INSERT INTO `event`(`Titre`, `CodeEvent`) VALUES ("'.$titre.'","'.$code.'")';
                        $bdd->executer($req);
                        $req = 'SELECT Id_Event From `event` WHERE `CodeEvent` Like "'.$code.'"';
                        $id_Event = $bdd->executer($req)->fetch()->Id_Event;
                        $req = 'INSERT INTO `participe`(`id_User`, `Id_Event`) VALUES ("'.$id_User.'","'.$id_Event.'")';
                        $bdd->executer($req);
                }
        //selected event
                public function selectedEvent($id_User,$bdd)
                {
                        $req = 'SELECT * FROM event 
                        INNER JOIN participe
                        ON event.Id_Event = participe.Id_Event
                        WHERE participe.id_User LIKE "'.$id_User.'"';
                        echo $req ;
                        $oRes = $bdd->executer($req);
                        while($Article = $oRes->fetch())
                        {
                        ?>
                                <option value="<?php echo $Article->Id_Event;?>"><?php echo $Article->Titre;?></option>
                        <?php
                        }
                }
        }