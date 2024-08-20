<?php


class review{
	private int $review_id ;	
	private int $userID ;
	private int $user_rating;	
  private string $user_review;
  private int $menuid ;
  private int $datetime;	

	public function __construct($userID,$user_rating,$user_review,$menuid){
		$this->userID = $userID;
    $this->user_rating = $user_rating;
    $this->user_review = $user_review;
	$this->menuid = $menuid;
    
	}

	public function getreview_id()
	{
		return $this->review_id;
	}


	public function getuserID()
	{
		return $this->userID;
	}
    public function setuserID(int $userID)
	{
		$this->userID = $userID;
	}


	public function getuser_rating()
	{
		return $this->user_rating;
	}
    public function setuser_rating(int $user_rating)
	{
		$this->user_rating = $user_rating;
	}

  public function getuser_review()
	{
		return $this->user_review;
	}
    public function setdatetime(int $datetime)
	{
		$this->datetime = $datetime;
	}

  public function getmenuid()
	{
		return $this->menuid;
	}
    public function setmenuid(int $menuid)
	{
		$this->menuid = $menuid;
	}
  
	

}

?>