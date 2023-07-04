<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <script src="fichier.js"></script>
    <script src="Evenement.js"></script>
    <title>Accueil</title>
</head>
<body>
    <?php
    ?>

    <div>

        <div class="menu">
            <ul>
                <li><a href="">Accueil</a></li>
                <li id="parentInsform"><a href="#">Inscrire Un apprenant</a>
                    <form id="Insform" method="post" action="connexion.php" class="Inscrip" style="display:none" >
                        <h1>Formulaire d'inscription</h1>
                        <input type="file" name="photo" >
                        <input type="text" placeholder="Matricule" name="matricule" >
                        <input type="text" placeholder="Nom" name="nom">
                        <input type="text" placeholder="Prenom" name="prenom" >
                        <input type="text" placeholder="Age" name="age" >
                        <input type="date" placeholder="Date de naissance" name="date_naissance" >
                        <input type="text" placeholder="Numéro de téléphone" name="numero_telephone" >
                        <input type="text" placeholder="Promotion" name="promotion" >
                        <input type="text" placeholder="Année de certification" name="annee_certification" >
                        <button type="submit" id="soumettreformulaire" name="button">Ajouter</button>
                    </form>
                </li>
                <li id="tableapprenant"><a href="">Liste des apprenants</a>
                    <table class="liste" id="ListeApprenants">
                     <tr>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Age</th>
                        <th>Date de Naissance</th>
                        <th>Numéro de téléphone</th>
                        <th>Promotion</th>
                        <th>Année de certifcation</th>
                        <th>Photo</th>
                      </tr>
                      <?php  
                        //Inclure la pge de connexion
                        include_once "connexion.php";
                        //requete pour afficher la liste des apprenants
                        $req = mysqli_query($mysql, "SELECT * FROM apprenant");
                        if(mysqli_num_rows ($req) == 0){
                            //S'il n'existe pas d'employé dans la base de données, alors on affiche ce message
                            echo "Il n'y a pas encore d'apprenant inscrit";
                        } else {
                        // sinon affichons la liste de tous les apprenants
                        while($row=mysqli_fetch_assoc($req)){
                            ?>
                            <tr>
                                <td><?=$row['matricule']?></td>
                                <td><?=$row['photo']?></td>
                                <td><?=$row['nom']?></td>
                                <td><?=$row['prenom']?></td>
                                <td><?=$row['age']?></td>
                                <td><?=$row['date_naissance']?></td>
                                <td><?=$row['numero_telephone']?></td>
                                <td><?=$row['promotion']?></td>
                                <td><?=$row['annee_certification']?></td>
                            </tr>
                            <?php
                        }
                        
                    }
                        ?> 
                    
                    </table>
                    <button id="boutonRetour">Retour</button>
                </li>
            </ul>
        </div>

        <div class="bienvenue" id="det">
            <h1>Bienvenue<br> sur le portail <br><span>D'Orange Digital Center</span></h1>
        </div>
    </div>
    <script>
        //Fonction du formulaire d'inscription
        document.getElementById("parentInsform").addEventListener("click", function () {
  var form = document.getElementById("Insform");
  const detail = document.getElementById('det');

  // Ajoutez une variable pour suivre l'état d'affichage du formulaire
  var isFormDisplayed = false;

  if (!isFormDisplayed) { // Vérifiez si le formulaire est masqué
    form.style.display = "block";
    detail.style.display = 'none';
    isFormDisplayed = true; // Mettez à jour l'état d'affichage du formulaire

    // Ajoutez un écouteur d'événements pour intercepter la soumission du formulaire
    form.addEventListener('submit', function(event) {

      // Masquez le formulaire après la soumission
form.style.display = "none";
detail.style.display = 'block';
isFormDisplayed = false;
    });
  } else { // Le formulaire est déjà affiché
    form.style.display = "none";
    detail.style.display = 'block';
    isFormDisplayed = false; // Mettez à jour l'état d'affichage du formulaire
  }
});
    </script>
</body>

</html>