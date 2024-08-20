<?php


if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['number'])&&isset($_POST['type_of_reclamation'])
&&isset($_POST['date'])&&isset($_POST['time'])&&isset($_POST['message'])){
    include '../controllers/function.php';
    include_once '../models/reclamtion.php';
                // constructer tormez
    $rec = new reclamtion($_POST['name'],$_POST['email'],$_POST['number'],$_POST['type_of_reclamation']
    ,$_POST['date'],$_POST['time'],$_POST['message']);
            // les fonction
    $reclam = new reclamtionf();

    $list= $reclam->addreclamation($rec);
    header("Location:reclamation.php");
}


?>