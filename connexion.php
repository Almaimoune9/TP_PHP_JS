<?php
   
// Connexion à la base de données
$mysql = new mysqli("localhost","root","","portail");

// Vérification de la connexion
if ($mysql->connect_error) {
	die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
}


// Récupération des données soumises par le formulaire
$matricule = $_POST['matricule'];
$photo = $_POST['photo'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$date_naissance = $_POST['date_naissance'];
$numero_telephone = $_POST['numero_telephone'];
$promotion = $_POST['promotion'];
$annee_certification = $_POST['annee_certification'];

// Requête SQL pour insérer les données dans la table appropriée
$sql = "INSERT INTO apprenant (matricule, nom, prenom, Age, date_naissance, Numero_telephone, promotion, Annee_certification, photo)
VALUES ('$matricule', '$nom', '$prenom', '$age', '$date_naissance', '$numero_telephone', '$annee_certification', '$promotion', '$photo')";

// Exécution de la requête
if ($mysql->query($sql) === TRUE) {
	echo "Données enregistrées avec succès.";
} else {
	echo "Erreur lors de l'enregistrement des données : " . $mysql->error;
}

// Fermeture de la connexion à la base de données
$mysql->close();

    // var_dump($_POST);
    
?>