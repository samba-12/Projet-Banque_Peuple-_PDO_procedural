<?php
	//var_dump($_POST);
	$serveur= "localhost";
	$login = "root";
	$pass = "root";
	
	try{
	
	$connexion = new PDO("mysql:host=$serveur;dbname=banque_populaire",$login,$pass);
	
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

	///CLIENT PHYSIQUE
	$requette=$connexion->prepare("INSERT INTO client_physique(prenom,nom,adresse,email,telephone,compte,salaire,infos_employeur,identification, numero) 
		VALUES (:prenom,:nom,:adresse,:email,:telephone,:compte,:salaire,:infos_employeur,:identification,:numero)");

	
	
		// $salaire = !empty($_POST['salaire']) ? $_POST['salaire'] : NULL;
		// $infos_employeur = !empty($_POST['infos_employeur']) ? $_POST['infos_employeur'] : NULL;
		// $identification = !empty($_POST['identification']) ? $_POST['identification'] : NULL;

		 if (isset($_POST['prenom'])) { $prenom = $_POST['prenom']; }
		 if (isset($_POST['nom'])) { $nom = $_POST['nom']; }
		 if (isset($_POST['adresse'])) { $adresse = $_POST['adresse']; }
		 if (isset($_POST['email'])) { $email = $_POST['email']; }
		 if (isset($_POST['telephone'])) { $telephone = $_POST['telephone']; }
		 if (isset($_POST['compte'])) { $compte = $_POST['compte']; }
		 if (isset($_POST['salaire'])) { $salaire = $_POST['salaire']; }
		 if (isset($_POST['infos_employeur'])) { $infos_employeur = $_POST['infos_employeur']; }
		 if (isset($_POST['identification'])) { $identification = $_POST['identification']; }
		 if (isset($_POST['numero'])) { $numero = $_POST['numero']; }


		$requette->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
		$requette->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
		$requette->bindValue(':adresse',$_POST['adresse'],PDO::PARAM_STR);
		$requette->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
		$requette->bindValue(':telephone',$_POST['telephone'],PDO::PARAM_STR);
		$requette->bindValue(':compte',$_POST['compte'],PDO::PARAM_STR);
		$requette->bindValue(':salaire',$_POST['salaire'],PDO::PARAM_STR);
		$requette->bindValue(':infos_employeur',$_POST['infos_employeur'],PDO::PARAM_STR);
		$requette->bindValue(':identification',$_POST['identification'],PDO::PARAM_INT);
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
<a href="../Client/physique.php"> Retour </a>
</body>
</html>