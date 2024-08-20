



<?PHP
 require_once ("C:/xampp/htdocs/xa/greenheal/models/Reservation.php");
 require_once ("C:/xampp/htdocs/xa/greenheal/controllers/ReservationC.php");
include_once 'myreservation2.php';
if(isset($_POST['supprimer']))
	 {
    
$id=$_POST['id'] ;
        $reservationTmpC=new ReservationC();
        $reservationTmpC->supprimerReservation($id);
        echo ('<script> alert("Reservation Supprimée"); </script>');
       

        }else{
            echo "vérifier les champs";
        }
     
    ?>
   
    