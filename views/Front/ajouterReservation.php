










<?PHP
require_once ("C:/xampp/htdocs/xa/greenheal/models/Reservation.php");
require_once ("C:/xampp/htdocs/xa/greenheal/Controllers/ReservationC.php");

if(isset($_POST['ajouter']))
	 {
        if (isset($_POST['nom']) and isset($_POST['evenement']) ){
            $reservationTmp= new Reservation($_POST['nom'],$_POST['evenement']);
    

        $reservationTmpC=new ReservationC();
        $reservationTmpC->ajouterReservation($reservationTmp);
        echo ('<script> alert("Reservation Envoye"); </script>');
       

        }else{
            echo "vérifier les champs";
        }
     }
     
     header('location:viewEvents.php') ; 
?>