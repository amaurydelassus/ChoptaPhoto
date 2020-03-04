<?php

class Reservation
{
    private     $id;
    public      $annee;
    public      $mois;
    public      $jour;
    private     $idUser;
    public      $idBorne;

    public function __construct($annee, $mois, $jour, $idUser=null, $idBorne=null)
    {
        $this->annee = $annee;
        $this->moi = $moi;
        $this->jour = $jour;
        $this->jour = $idBorne;
        $this->setIdUser($idUser);
    }

    // GET AND SET
        public function getIdUser()
        {
            return $this->idUser;
        }

        public function setIdUser($idUser)
        {
            $this->idUser = $idUser;

            return $this;
        }
}