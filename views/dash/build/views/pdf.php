<?php
require 'vendor/autoload.php';
require_once '../config.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$id=$_POST["id"];
$db = config::getConnexion();
$sql = "SELECT * FROM `message` inner join users on message.email = users.user_id ";

$query = $db->query($sql);
$reclamations = $query->fetchAll();


ob_start();
require_once 'pdf_contenu.php';
$html = ob_get_contents();
ob_end_clean();
$options = new Options();
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

$fichier = 'reclamation.pdf';
$dompdf->stream($fichier);
header('Location: reclamation.php');

?>