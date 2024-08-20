<?php
include_once '../config.php';
include_once '../models/Menu.php';
include_once '../models/ing.php';


class MenuC
{
    public function listMenu()
    {
        $sql = "SELECT * FROM Menu inner join  categories on menu.type=categories.IDtype   inner join  ing on menu.iding =ing.iding  ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteMenu($id)
    {
        $sql = "DELETE FROM Menu WHERE IDMenu = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addMenu($Menu)
    {   //echo $Menu->getNomMenu();
        //echo $Menu->Description();
        //echo $Menu->getMenuEvent();
        //echo $Menu->getPrix();
        //echo $Menu->getPromotion();
        //echo $Menu->gettype();
        //echo $Menu->getiding();

        
        $sql = "INSERT INTO Menu (IDMenu,NomMenu,Description,MenuEvent,Prix,Promotion,type,PhotoMenu,iding)
        VALUES (NULL, :n, :p, :a, :d, :c, :z,:w,:iding)";
        $db = config::getConnexion();
        try {
           
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $Menu->getNomMenu(),
                'p' => $Menu->Description(),
                'a' => $Menu->getMenuEvent(),
                'd' => $Menu->getPrix(),
                'c' => $Menu->getPromotion(),
                'z' => $Menu->gettype(),
                'w' => $Menu->getPhotoMenu(),
                'iding' => $Menu->getiding()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }




    function updateMenu($Menu, $id)
    {


        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Menu SET 
                    NomMenu = :NomMenu, 
                    Description = :Description, 
                    MenuEvent = :MenuEvent, 
                    Prix = :Prix,
                    Promotion = :Promotion, 
                    type = :type,
                    PhotoMenu = :PhotoMenu
                    
                WHERE IDMenu= :IDMenu'
            );
            $query->execute([
                'IDMenu' => $id,
                'NomMenu' => $Menu->getNomMenu(),
                'Description' => $Menu->Description(),
                'MenuEvent' => $Menu->getMenuEvent(),
                'Prix' => $Menu->getPrix(),
                'Promotion' => $Menu->getPromotion(),
                'type' => $Menu->gettype(),
                'PhotoMenu' => $Menu->getPhotoMenu()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showMenu($id)
    {
        $sql = "SELECT * from Menu where IDMenu = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Menu = $query->fetch();
            return $Menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

//////////////////
Function totalMenu(){

    $requette = "SELECT count(*) from menu  ";
    $db = config::getConnexion();
        
      try{
  
          $query1 = $db->query($requette);
      $query1->execute();
      $total = $query1->fetchColumn();
  
     return $total;
      }
      catch(Exception $e){
          die('Erreur: '.$e->getMessage());
      }   
  }


//******************************Function search user*********************************/
Function searchMenu($search){
    $sql="SELECT * FROM menu inner join  categories on menu.type=categories.IDtype  inner join  ing on menu.iding =ing.iding  WHERE  (( typeMenu LIKE '%".$search."%' )  ) ";
      
      $db = config::getConnexion();
      try{
          $liste = $db->query($sql);
          return $liste;
      }
      catch(Exception $e){
          die('Erreur: '.$e->getMessage());
      } 
  
  }




}




















class IngC
{
    public function listing()
    {
        $sql = "SELECT * FROM Ing";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteIng($id)
    {
        $sql = "DELETE FROM Ing WHERE iding = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addIng($Ing)
    {  
        
        $sql = "INSERT INTO Ing (iding,noming,typeing,qte)
        VALUES (NULL, :n, :p,:qte)";
        $db = config::getConnexion();
        try {
           
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $Ing->getnoming(),
                'p' => $Ing->typeing(),
                'qte' => $Ing->getqte()
             
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateIng($Ing, $id)
    {


        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Ing SET 
                    noming = :noming, 
                    typeing = :typeing, 
                    qte = :qte
                    
                    
                WHERE iding= :iding'
            );
            $query->execute([
                'iding' => $id,
                'noming' => $Ing->getnoming(),
                'typeing' => $Ing->typeing(),
                'qte' => $Ing->getqte()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showIng($id)
    {
        $sql = "SELECT * from Ing where iding = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Menu = $query->fetch();
            return $Menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

//////////////////
Function totalMenu(){

    $requette = "SELECT count(*) from menu  ";
    $db = config::getConnexion();
        
      try{
  
          $query1 = $db->query($requette);
      $query1->execute();
      $total = $query1->fetchColumn();
  
     return $total;
      }
      catch(Exception $e){
          die('Erreur: '.$e->getMessage());
      }   
  }





}









class couponC
{
    public function couponlist()
    {
        $sql = "SELECT * FROM coupon ORDER BY RAND () ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

}

   

