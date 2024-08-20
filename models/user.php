<?php

class User{
	private int $user_id;	
	private string $nom;
	private string $prenom;
  private string $username;
  private string $email;
  private string $role;
  private string $phone;
  private string $password;
  private int $status;
  private int $verified_email;
  private string $token;
  private string $about_me;
  private string $fb_link;
  private string $linkedin_link;
  private string $img_url;
	private string $address;


	public function getuser_id()
	{
		return $this->user_id;
	}


  public function getnom()
	{
		return $this->nom;
	}
    public function setnom(string $nom)
	{
		$this->nom = $nom;
	}


  public function getprenom()
	{
		return $this->prenom;
	}
    public function setprenom(string $prenom)
	{
		$this->prenom = $prenom;
	}


  public function getusername()
	{
		return $this->username;
	}
    public function setusername(string $username)
	{
		$this->username = $username;
	}


  public function getemail()
	{
		return $this->email;
	}
    public function setemail(string $email)
	{
		$this->email = $email;
	}

  public function getrole()
	{
		return $this->role;
	}
    public function setrole(string $role)
	{
		$this->role = $role;
	}


  public function getphone()
	{
		return $this->phone;
	}
    public function setphone(string $phone)
	{
		$this->phone = $phone;
	}


  public function getpassword()
	{
		return $this->password;
	}
    public function setpassword(string $password)
	{
		$this->password = $password;
	}


  public function getstatus()
	{
		return $this->status;
	}
    public function setstatus(int $status)
	{
		$this->status = $status;
	}


  public function getverified_email()
	{
		return $this->verified_email;
	}
    public function setverified_email(int $verified_email)
	{
		$this->verified_email = $verified_email;
	}
  

  public function gettoken()
	{
		return $this->token;
	}
    public function settoken(string $token)
	{
		$this->token = $token;
	}
  
  public function getabout_me()
	{
		return $this->about_me;
	}
    public function setabout_me(string $about_me)
	{
		$this->about_me = $about_me;
	}

	public function getfb_link()
	{
		return $this->fb_link;
	}
    public function setfb_link(string $fb_link)
	{
		$this->fb_link = $fb_link;
	}
  
  public function getlinkedin_link()
	{
		return $this->linkedin_link;
	}
    public function setlinkedin_link(string $linkedin_link)
	{
		$this->linkedin_link = $linkedin_link;
	}
  
  public function getimg_url()
	{
		return $this->img_url;
	}
    public function setimg_url(string $img_url)
	{
		$this->img_url = $img_url;
	}

	public function getaddress()
	{
		return $this->address;
	}
    public function setaddress(string $address)
	{
		$this->address = $address;
	}

	

}

?>
