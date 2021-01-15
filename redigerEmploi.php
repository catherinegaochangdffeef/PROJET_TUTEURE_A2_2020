<?php>
include 'database.php';
session_start();


$intitule = $_POST['intitule'];
$description = $_POST['description'];
$motCle = $_POST['motCle'];



try{
    $sql="INSERT INTO OffreEmploi VALUES(?,?,?,?)";
    $stmt=$objPdo->prepare($sql);
    $stmt->bindValue(1,0);
    $stmt->bindValue(2,$intitule);
    $stmt->bindValue(3,$description);
    $stmt->bindValue(4,0);
    $count=$stmt->execute();
    
    if($count<>0){
        echo"<script type='text/javascript'>alert('Création réussi !');location='pageRH.html';</script>";  
            
      }
      else
      {
        echo"<script type='text/javascript'>alert('Création échoué!'); location='redigerEmploi.html';</script>";  
      }
}
catch(Exception $e){
	echo $e->getMessage();
}
  

?>