<?php

    class Reservation{
        private $nom = null;
        private $evenement = null;
     
        function __construct($id = null,$nom,$evenement){
                $this->id = $id;
            $this->nom = $nom;
            $this->evenement = $evenement;
         


        }   
      
        
        public function getnom()
        {
                return $this->nom;
        }
        public function setnom($nom)
        {
                $this->nom = $nom;

               
        }

        public function getevenement()
        {
                return $this->evenement;
        }

       
        public function setevenement($evenement)
        {
                $this->evenement = $evenement;

        }

      
    }
?>