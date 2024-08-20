<?php

class Panier{
	private int $panier_id;	
	private int $client_id;
	private int $commande_id;	
  private int $nb_commande;
  private string $date_checkout;
  private int $checkOut_verify;	

	public function __construct($client_id, $commande_id, $nb_commande){
		$this->client_id = $client_id;
		$this->commande_id = $commande_id;
    $this->nb_commande = $nb_commande;
	}

	public function getpanier_id()
	{
		return $this->panier_id;
	}


	public function getclient_id()
	{
		return $this->client_id;
	}
    public function setclient_id(int $client_id)
	{
		$this->client_id = $client_id;
	}


	public function getcommande_id()
	{
		return $this->commande_id;
	}
    public function setcommande_id(int $commande_id)
	{
		$this->commande_id = $commande_id;
	}

  public function getnb_commande()
	{
		return $this->nb_commande;
	}
    public function setnb_commande(int $nb_commande)
	{
		$this->nb_commande = $nb_commande;
	}

  public function getdate_checkout()
	{
		return $this->date_checkout;
	}
    public function setdate_checkout(int $date_checkout)
	{
		$this->date_checkout = $date_checkout;
	}
  
  public function getcheckOut_verify()
	{
		return $this->checkOut_verify;
	}
    public function setcheckOut_verify(int $checkOut_verify)
	{
		$this->checkOut_verify = $checkOut_verify;
	}



	

}

?>
