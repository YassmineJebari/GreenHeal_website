<?php



class Menu
{
  private ?int $IDMenu = null;
  private ?string $NomMenu = null;
  private ?string $Description = null;
  private ?string $MenuEvent = null;
  private ?int $Prix = null;
  private ?int $Promotion = null;
  private ?int $type = null;
  private ?string $PhotoMenu = null;
  private ?int $iding = null;

  public function __construct($id = null, $n, $p, $a, $d,$c,$z,$w,$iding)
  {
      $this->IDMenu = $id;
      $this->NomMenu = $n;
      $this->Description = $p;
      $this->MenuEvent = $a;
      $this->Prix = $d;
      $this->Promotion = $c;
      $this->type = $z;
      $this->PhotoMenu = $w;
      $this->iding = $iding;
  }


    //********************************************************//

    public function getPhotoMenu()
    {
		return $this->PhotoMenu;
    }
    
    public function getiding()
    {
		return $this->iding;
    }
    
    
    public function getIDMenu()
    {
		return $this->IDMenu;
    }
    
    public function getNomMenu()
    {
		return $this->NomMenu;
    }
    
    public function Description()
    {
		return $this->Description;
    }
    
    public function getMenuEvent()
    {
		return $this->MenuEvent;
    }
    
    public function getPrix()
    {
		return $this->Prix;
    }
    
    public function getPromotion()
    {
		return $this->Promotion;
    }

    public function gettype()
    {
		return $this->type;
    }

   

       //********************************************************//
    
       public function setIDMenu($IDMenu)
    {
		$this->IDMenu=$IDMenu;
    }

    public function setNomMenu($NomMenu)
    {
		$this->NomMenu=$NomMenu;
    }
    
    public function setDescription($Description)
    {
		$this->Description=$Description;;
    }
    
    public function setMenuEvent($MenuEvent)
    {
		$this->MenuEvent=$MenuEvent;
    }
    
    public function setPrix($Prix)
    {
		$this->Prix=$Prix;;
    }
    
    public function setPromotion($Promotion)
    {
		$this->Promotion=$Promotion;
    }

    public  function settype($type)
    {
		$this->type=$type;
    }

  
    public  function setPhotoMenu($PhotoMenu)
    {
		$this->PhotoMenu=$PhotoMenu;
    }

    public  function setiding($iding)
    {
		$this->iding=$iding;
    }
    

}