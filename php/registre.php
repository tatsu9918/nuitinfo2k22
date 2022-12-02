<?php    
    $server = "localhost";
    $db = "nuitinfo";
    $login = "root";
    $mdp = "";

    ///Connexion au serveur MySQL
    try {
    $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
    }
    catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
    }

    echo "Registre\n";

    //$req = $dbh->prepare("SELECT * from ist order by idIst");
    //$req->execute();
    //$data=$req->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($data);
    //exit();
    
    $req1 = $linkpdo->prepare("SELECT * from ist where idIst = 1");
    $req1->execute();
    foreach ($req1 as $row) {
        $idIst  = ($row["idIst"]);
        $nom    = ($row["nom"]);
        $desc  = ($row["description"]);
        $vaccin  = ($row["vaccin"]);

        if($vaccin == 1){
            $vaccin = "../images/yes.png";
        } else {
            $vaccin = "../images/no.png";
        }
    
    $req2 = $linkpdo->prepare("SELECT libelle from symptome,ist,concerner where ist.idIst = 1 and ist.idIst = concerner.idIst and concerner.idSymptome = symptome.idSymptome");
    $req2->execute();
    
    foreach ($req1 as $row) {
        $listeSymptome = $listeSymptome.$row["libelle"];
    }

}
?>

<meta charset="UTF-8">
<title>Registre</title>
<link rel="stylesheet" href="../css/registre.css">
<div>
        <div class="l1">
            <div class="nom"><p>Nom : <?php print($nom) ?></p></div>
            <div class="divImage"><img src="../images/ist.jfif" alt="image de l'ist" class="image"></div>
        </div>
        <div class="description l2"><p>Description : <?php print($desc) ?></p></div>
        <div class="l3">
            <div class="symptome"><p>Symptome : <?php print($listeSymptome) ?></p></div>
            <div class="vaccin"><p>Vaccin : </p> <img src="<?php echo $vaccin;?>" class="image"></div>
        </div>
        <div class="l4">
            <div class="guerissable"></divclass><p>Guérissable</p></div>
            <div class="type"><p>Type</p></div>
            <div class="transmission"><p>Transmission</p></div>
        </div>
    </div>