<?php



class Event
{
  private ?int $EventID  = null;
  private ?string $Title = null;
  private ?string $Description = null;
  private $StartDate = null;
  private ?string $photo = null;
  private ?int $Cost = null;
  private ?string $LocationID  = null;
 

  public function __construct($id = null, $n, $p, $a, $d,$c,$z)
  {
      $this->EventID  = $id;
      $this->Title = $n;
      $this->Description = $p;
      $this->StartDate = $a;
      $this->Cost = $d;
      $this->LocationID  = $c;
      $this->photo = $z;
     
  }


    //********************************************************//

    public function getPhoto()
    {
		return $this->photo;
    }
    public  function setPhoto($photo)
    {
		$this->photo=$photo;
    }


    
    
    public function getEventID()
    {
		return $this->EventID;
    }


    public function setEventID($EventID)
    {
		$this->EventID=$EventID;
    }



    
    public function getTitle()
    {
		return $this->Title;
    }
    

    public function setTitle($Title)
    {
		$this->Title=$Title;
    }
    



    public function Description()
    {
		return $this->Description;
    }
    

    public function setDescription($Description)
    {
		$this->Description=$Description;;
    }




    public function getStartDate()
    {
		return $this->StartDate;
    }
    public function setStartDate($StartDate)
    {
		$this->StartDate=$StartDate;
    }






    
    public function getCost()
    {
		return $this->Cost;
    }

 
    public function setCost($Cost)
    {
		$this->Cost=$Cost;;
    }
    



    
    public function getLocationID()
    {
		return $this->LocationID;
    }

    public function setLocationID($LocationID)
    {
		$this->LocationID=$LocationID;
    }




   

   

       //********************************************************//
    


    

   

    
    

}