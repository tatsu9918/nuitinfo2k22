<?php    
    $server = "localhost";
    $db = "nuitinfo";
    $login = "root";
    $mdp = "";

    $listeSymptomeHomme = "";
    $listeSymptomeFemme = "";
    $guerissable = "";
    $transmission = "";

    $idIstGlobal = 5;

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
    
    $req1 = $linkpdo->prepare("SELECT * from ist where idIst = $idIstGlobal");
    $req1->execute();
    foreach ($req1 as $row) {
        $idIst  = ($row["idIst"]);
        $nom    = ($row["nom"]);
        $desc  = ($row["description"]);
        $vaccin  = ($row["vaccin"]);
        $guerissable = ($row["Guerissable"]);

        if($vaccin == 1){
            $vaccin = "../images/yes.png";
        } else {
            $vaccin = "../images/no.png";
        }

        if($guerissable == 1){
            $guerissable = "../images/yes.png";
        } else {
            $guerissable = "../images/no.png";
        }


    
    $req2 = $linkpdo->prepare("SELECT libelle from symptome,ist,concerner where ist.idIst = $idIstGlobal and ist.idIst = concerner.idIst and concerner.concerneHomme = 1 and concerner.idSymptome = symptome.idSymptome;");
    $req2->execute();
    
    foreach ($req2 as $row) {
        $listeSymptomeHomme = $listeSymptomeHomme.", ".$row["libelle"];
    }

    $req3 = $linkpdo->prepare("SELECT libelle from symptome,ist,concerner where ist.idIst = $idIstGlobal and ist.idIst = concerner.idIst and concerner.concerneFemme = 1 and concerner.idSymptome = symptome.idSymptome;");
    $req3->execute();

    foreach ($req3 as $row) {
        $listeSymptomeFemme = $listeSymptomeFemme.", ".$row["libelle"];
    }

    $req4 = $linkpdo->prepare("SELECT libelle from forme,ist where idIst = 1 and ist.idType = forme.idType;");
    $req4->execute();
    foreach ($req4 as $row) {
        $forme = ($row["libelle"]);
    }

    $req5 = $linkpdo->prepare("SELECT libelle from transmission, transmettre, ist where ist.idIst = $idIstGlobal and ist.idIst = transmettre.idist and transmettre.idTransmission = transmission.idTransmission;");
    $req5->execute();
    foreach ($req5 as $row) {
        $transmission = ($row["libelle"]);
    }

}
?>

<meta charset="UTF-8">
<title>Registre</title>
<link rel="stylesheet" href="../css/registre.css">
<div>
        <div class="l2">
            <div class="nom"><p>Nom : <?php print($nom) ?></p></div>
            <div class="divImage"><img src="../images/ist.jfif" alt="image de l'ist" class="image"></div>
        </div>
        <div class="description l2"><p>Description : <?php print($desc) ?></p></div>
        <div class="l3">
            <div class="symptome">  <p>Symptome pour les hommes: <?php print($listeSymptomeHomme) ?></p>
                                    <p>Symptome pour les femmes: <?php print($listeSymptomeFemme) ?></p></div>
            <div class="vaccin"><p>Vaccin : </p> <img src="<?php echo $vaccin;?>" class="image"></div>
        </div>
        <div class="l4">
            <div class="guerissable"> <p>Guérissable : </p> <img src="<?php echo $guerissable;?>" class="image"> </div>
            <div class="type"><p>Type : <?php print($forme) ?></p></div>
            <div class="transmission"><p>Transmission : <?php print($transmission) ?></p></div>
        </div>
    </div>