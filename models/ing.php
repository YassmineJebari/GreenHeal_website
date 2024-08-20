<?php



class Ing
{
  private ?int $iding  = null;
  private ?string $noming = null;
  private ?string $typeing = null;
  private ?int $qte  = null;
  


  public function __construct($id = null, $n, $p , $qte)
  {
      $this->iding = $id;
      $this->noming = $n;
      $this->typeing = $p;
      $this->qte = $qte;
     
     
  }


    //********************************************************//

   
    
    public function getiding()
    {
		return $this->iding;
    }
    
    public function getnoming()
    {
		return $this->noming;
    }
    
    public function typeing()
    {
		return $this->typeing;
    }
    
    public function getqte()
    {
		return $this->qte;
    }
    

       //********************************************************//
    
       public function setiding($iding)
    {
		$this->iding=$iding;
    }

    public function setnoming($noming)
    {
		$this->noming=$noming;
    }
    
    public function settypeing($typeing)
    {
		$this->typeing=$typeing;;
    }
    
    public function setqte($qte)
    {
		$this->qte=$qte;
    }
    
}