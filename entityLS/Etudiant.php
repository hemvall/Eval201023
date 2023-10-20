<?php
    class Etudiant{
        private $id;
        private $nom;
        private $prenom;
        
        public function __construct($i, $n, $p){
            $this->id = $i;
            $this->nom = $n;
            $this->prenom = $p;
        }
        
                
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            return $this->id;
        }
        
        public function getNom(){
            return $this->nom;
        }
        public function setNom($nom){
            return $this->nom;
        }
        
        public function getPrenom(){
            return $this->prenom;
        }
        public function setPrenom($prenom){
            return $this->prenom;
        }
        // a
    }
?>