



<?PHP
 require_once ("C:/xampp/htdocs/xa/greenheal/models/Reservation.php");
 require_once ("C:/xampp/htdocs/xa/greenheal/controllers/ReservationC.php");
include_once 'myreservation2.php';
if(isset($_POST['updatee']))
	 {
    
$id=$_POST['id'] ;
$nom=$_POST['nom'];
        $reservationTmpC=new ReservationC();
        $reservationTmpC->modifierReservation($nom,$id);
        echo ('<script> alert("modifier"); </script>');
       

        }else{
            echo "vérifier les champs";
        }
     
    ?>
   
    