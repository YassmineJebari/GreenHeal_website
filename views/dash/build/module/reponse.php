<?php
class Reponse
{
    private $id =null;
    private $message;
    private $id_reclamation;
    function __construct($message,$id_reclamation)
    {
      $this->id =null;
      $this->message= $message;
      $this->id_reclamation= $id_reclamation;
    }

  // Les Getters
  function getidrec(){
    return $this->id;
} 
function getreprec(){
    return $this->message;
}
function getid_rec(){
    return $this->id_reclamation;
} 
// Les Setters
function setMessage($message){
    $this->message= $message;
}
function setIDReclamation($id_reclamation){
    $this->id_reclamation= $id_reclamation;
}
}
?>