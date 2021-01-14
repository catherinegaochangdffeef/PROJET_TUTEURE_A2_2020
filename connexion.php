<?php
include 'database.php';
session_start();
$user = $_POST['user'];
$mdp = $_POST['mdp'];


try{
	$req=$objPdo->prepare("select * from Administrateur where identifiant=? and mot_de_passe=?");
		$req->bindValue(1, strip_tags($user), PDO::PARAM_STR);
		$req->bindValue(2, strip_tags($mdp), PDO::PARAM_STR);
		//strip_tags, eviter l'injection, PHP htmlentites()
	$req->execute();
	if($row=$req->fetch()){
		$_SESSION['id']=$row['num_admin'];
        $_SESSION['nom']=$row['nom_admin'];
		header('Location: pageRH.html');

	}
	else{
		echo "<script>history.go(-1);alert('mdp erreur');</script>";
	}
}
catch(Exception $e){
	echo $e->getMessage();
}
  
?>