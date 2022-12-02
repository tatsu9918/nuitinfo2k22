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
    
    $req = $linkpdo->prepare("SELECT * from ist where idIst = 1");
    $req->execute();
    foreach ($req as $row) {
    print_r($row);
}
?>