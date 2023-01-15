<?php

// CLASSE
class User
{
    // Attributs de la classe User
    private int $id;
    public string $login;
    private PDO $db;

// # - - MÉTHODES - - # //

    // Construct pour la connexion à la BDD
    function __construct()
    {
        $DB_DSN = 'mysql:host=localhost;dbname=memory';
        $username = 'memory';
        $password_db = '28%7Jl6mw';

        try {
            $options =
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // BE SURE TO WORK IN UTF8
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//ERROR TYPE
                    PDO::ATTR_EMULATE_PREPARES => false // FOR NO EMULATE PREPARE (SQL INJECTION)
                ];
            $this->db = new PDO($DB_DSN, $username, $password_db, $options); // PDO CONNECT

        } catch (PDOException $e) { //CATCH ERROR IF NOT CONNECTED
            print "Erreur !: " . $e->getMessage() . "</br>";
            die();
        }
    }

    // Méthode pour que l'utilisateur puisse s'enregitrer
    public function register($login, $password)
    {
        // on appelle l'objet dans la méthode courante
        $this->login = $login;
        $this->password = $password;

        // la requête pour insérer les données dans la BDD
        $sql_insert = "INSERT INTO utilisateurs(login, password) VALUES(:login, :password)";
        $sql_insert_exe = $this->db->prepare($sql_insert);
        $sql_insert_exe->execute(array(
            'login' => $this->login,
            'password' => $this->password,
        ));
        $result = $sql_insert_exe->fetch(PDO::FETCH_ASSOC);

        // on execute la requête et vérifie si celle-ci est executée ou non
        if ($sql_insert_exe) {
            echo "Inscription réussie";
            header("Refresh: 2; url=connexion.php");
        } else {
            echo "L'inscription a échoué";
        }
    }

    // Méthode pour que l'utilisateur puisse se connecter
    public function connect($login, $password)
    {
        $this->login = $login;
        $this->password = $password;

        $sql_verify = "SELECT * FROM utilisateurs WHERE login = :login AND password = :password";
        $sql_verify_exe = $this->db->prepare($sql_verify);
        $sql_verify_exe->bindParam(':login', $login);
        $sql_verify_exe->bindParam(':password', $password);// Execute query on the database$sql_verify_exe->fetch(PDO::FETCH_ASSOC);
        $sql_verify_exe->execute();

        if ($sql_verify_exe->rowCount() != 0) {
            $_SESSION['login'] = $login;
            echo "Connexion réussie" . "<br>";
            header("Refresh:3; url=profil.php");

        } else {
            echo "La connexion a échoué";
        }
    }


    // Méthode pour que l'utilisateur puisse se déconnecter
    public function disconnect()
    {
        echo "Vous êtes en train de vous déconnecter";
        unset($_SESSION);
        session_destroy();
        header("Location: connexion.php");
    }


    // Méthode pour que l'utilisateur puisse supprimer son compte
    public function delete()
    {
        $this->login = $_SESSION['login'];
        // la requête pour insérer les données dans la BDD
        $sql_delete = "DELETE FROM utilisateurs WHERE login ='$this->login'";
        // on execute la requête et vérifie si celle-ci est executée ou non
        $sql_delete_exe = $this->db->prepare($sql_delete);
        $sql_delete_exe->execute();
        echo "Suppression réussie";
        header("Refresh: 1, url=inscription.php");

    }


    // Méthode qui retourne un booléen permettant de savoir si un utilisater est connecté ou non
    public function isConnected()
    {
        if ($_SESSION['login']) {
            echo "Vous êtes connecté en tant que {$_SESSION['login']}";
        } else {
            header("Location: connexion.php");
        }
    }

    // Méthode pour retourner les informations de l'utilisateur dans un tableau
    public function getAllInfos()
    {
        $login = $_SESSION['login'];

        $sql_info = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $sql_info->execute(array(
            'login' => $login
        ));
        $result_info = $sql_info->fetch(PDO::FETCH_ASSOC);
        $this->login = $result_info['login'];
        $this->password = $result_info['password'];


    }
}



