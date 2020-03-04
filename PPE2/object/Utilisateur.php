<?php

    class Utilisateur
    {
        private     $id;
        public      $login;
        public      $nom;
        public      $prenom;
        private     $password;
        private     $type;
    
        public function __construct($login, $password, $nom = "",$prenom = "",$type="2")
        {
            $this->login = addslashes($login);
            $this->nom = addslashes($nom);
            $this->prenom = addslashes($prenom);
            $this->setType($type);
            $this->setPassword($password);
            $this->setId(-1);
        }

        //  Get and Set
            public function getPassword()
            {
                return $this->password;
            }
            
            public function setPassword($password)
            {
                $this->password = md5($password);
            }
            
            public function getId()
            {
                return $this->id;
            }

            public function setId($id)
            {
                $this->id = $id;
            }

            public function getType()
            {
                return $this->type;
            }

            public function setType($type)
            {
                $this->type = addslashes($type) ;
            }


        
        //  Enregistrement
        
            public function     enregistrer($BDD)
            {
                $req = 'INSERT INTO users(login,nom,prenom,pwd,type) VALUES("'.$this->login.'","'
                    . $this->nom . '","' . $this->prenom . '","'
                    . $this->getPassword() . '","'. $this->getType() . '")';
                $BDD->executer($req);
                if($BDD->dbo->errorInfo()[0] == 23000)
                    return("Vous poss&eacute;dez d&eacute;j&agrave; un compte avec l'adresse ". $this->login);
                else
                    $this->setId($BDD->dbo->lastInsertId());
                return("true");
            }
        
        //  Connexion
            public function seConnecter($BDD) 
            {
            $req = 'SELECT * FROM users WHERE login LIKE "'.$this->login.'" && pwd LIKE "'.$this->getPassword().'"';
            $oRes = $BDD->executer($req);
            if($BDD->dbo->errorInfo()[0] == "00000")
            {
                if($res = $oRes->fetch())
                {
                $this->id = $res->id;
                $this->login = $res->login;
                $this->nom = $res->nom;
                $this->prenom = $res->prenom;
                $this->type = $res->type;
                return(true);
                }
                    else{
                        return(false);
                    }
            }
            else
            {
                //print_r($BDD->dbo->errorInfo());
                return(false);
            }
            
            }
        
        //  Creation de la session
            public function createSession()
            {
                $_SESSION["login"] = $this->login;
                $_SESSION["id"] = $this->getId();
                $_SESSION["type"]= $this->getType();
            }
        
    }
?>
