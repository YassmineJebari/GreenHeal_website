<?php



class reclamtion
{
  private ?int $id  = null;
  private $type_of_reclamation = null;
  private $date = null;
  private ?string $message  = null;
  private $email  = null;

  public function __construct($id = null,$n, $p, $a,$user)
  {
      $this->id  = $id;
      $this->type_of_reclamation = $n;
      $this->date = $p;
      $this->message = $a;
      $this->email = $user;
     
  }


    //********************************************************//

    public function gettype_of_reclamation()
    {
		return $this->type_of_reclamation;
    }
    public  function settype_of_reclamation($type_of_reclamation)
    {
		$this->type_of_reclamation=$type_of_reclamation;
    }


    public function getuser()
    {
		return $this->email;
    }
    public  function setuser($email)
    {
		$this->email=$email;
    }

    
    
    public function getid()
    {
		return $this->id;
    }


    public function setid($id)
    {
		$this->id=$id;
    }



    
    public function getdate()
    {
		return $this->date;
    }
    

    public function setdate($date)
    {
		$this->date=$date;
    }
    



    public function message()
    {
		return $this->message;
    }
    

    public function setmessage($message)
    {
		$this->message=$message;;
    }



   

    
    

}




















