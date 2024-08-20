<?php
class Reponse
{
    private $id;
    private $message;
    private $id_reclamation;
    function __construct($message,$id_reclamation)
    {
      $this->message= $message;
      $this->id_reclamation= $id_reclamation;
    }

  // Les Getters
  function getId(){
    return $this->id;
} 
function getMessage(){
    return $this->message;
}
function getIdReclamation(){
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