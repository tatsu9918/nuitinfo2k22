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

    $req = 'SELECT * from ist order by idIst;';
?>