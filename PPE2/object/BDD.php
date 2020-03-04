<?php

class BDD
{
    private $dbname;
    private $host;
    private $user;
    private $password ;
    public  $dbo; // PDO
    
    public function __construct($dbname,$host,$user,$password)
    {
          $this->setDbname($dbname);
          $this->setHost($host);
          $this->setPassword($password);
          $this->setUser($user);
          $this->connexion();   
    }
    //get and set
        function __destruct()
        {}
        
        public function getDbname()
        {
            return $this->dbname;
        }
        
        public function getHost()
        {
            return $this->host;
        }
        
        public function getUser()
        {
            return $this->user;
        }
        
        public function getPassword()
        {
            return $this->password;
        }
        
        public function setDbname($dbname)
        {
            $this->dbname = $dbname;
        }
        
        public function setHost($host)
        {
            $this->host = $host;
        }
        
        public function setUser($user)
        {
            $this->user = $user;
        }
        
        public function setPassword($password)
        {
            $this->password = $password;
        }
    
    // FONCTION CONNEXION PERMET DE CREER LE PDO
        private function connexion()
        {
            $dsn = 'mysql:dbname='.$this->getDbName().';host='.$this->getHost();
            try 
            {
                $this->dbo = new PDO($dsn, $this->getUser(), $this->getPassword());
                $this->dbo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }
            catch (PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    // FONCTION executer 
        public function executer($req)
        {
            return($this->dbo->query($req));
        }
}

