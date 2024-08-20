<?PHP 
require_once ("C:/xampp/htdocs/xa/greenheal/models/Reservation.php");
require_once ("C:/xampp/htdocs/xa/greenheal/Controllers/ReservationC.php");
$formation1C=new ReservationC(); 

if(!isset($_POST['str'])){
    $liste=$formation1C->afficherReservation();
}
foreach($liste as $row){
    ?>
       <tr>
       <td><?PHP echo $row['nom'];  ?></td> 
       <td><?PHP echo $row['evenement']; ?></td>
   
      
      
       
     
     
       <td><form method="POST" action="supprimerReservation.php">  
       <input class="btn btn-danger"  type="submit" title="Delete" Value="Delete" border="0" name="supprimer">
       <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id"> 
       
       </form> 
       <a href="edit-events.php?id=<?PHP echo $row['id']; ?>" class="btn btn-success" data-toggle="tooltip" title="Edit" >Edit<i class="fas fa-pencil-alt"></i></a>
       </td>
       </tr>
       <?PHP 
    
}
    ?>