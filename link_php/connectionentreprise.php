<?php
	//var_dump($_POST);
	$serveur= "localhost";
	$login = "root";
	$pass = "root";

	
	try{
	
	$connexion = new PDO("mysql:host=$serveur;dbname=banque_populaire",$login,$pass);
	
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

	
		$requette=$connexion->prepare("INSERT INTO client_entreprise(nom_entreprise,adresse,email,telephone,ninea,compte,numero) 
		VALUES (:nom_entreprise,:adresse,:email,:telephone,:ninea,:compte,:numero)");

		$requette->bindValue(':nom_entreprise',$_POST['nom_entreprise'],PDO::PARAM_STR);
		$requette->bindValue(':adresse',$_POST['adresse'],PDO::PARAM_STR);
		$requette->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
		$requette->bindValue(':telephone',$_POST['telephone'],PDO::PARAM_STR);
		$requette->bindValue(':ninea',$_POST['ninea'],PDO::PARAM_STR);
		$requette->bindValue(':compte',$_POST['compte'],PDO::PARAM_STR);
		$requette->bindValue(':numero',$_POST['numero'],PDO::PARAM_INT);

		$requette->execute();
				
	}
	catch(PDOException $e){
		echo 'Echec de la connexion: ' . $e->getMessage();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Client  Ajouté</h1>
<a href="../Client/entreprise.php"> Retour </a>

</body>
</html>
		