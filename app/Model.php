<?php 
// Abstract permet de pas instancié directement la classe 
abstract class Model {
    // Information de base de données
    private $host = "localhost";
    private $db_name = "test_technique";
    private $username = "root";
    private $password = "root";

    // Propriété contenant la connexion
    protected $_connexion;

    // Propriétés contenant les informations de requêtes
    public $table;
    public $id;

    /**
     * Permets la connexion à la base de données
     */
    public function getConnection() {
        $this->_connexion = null;

        try {
            $this->_connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            // Permet de tout excécuté en UTF-8
            $this->_connexion->exec('set names utf8');
        } catch(PDOException $exception) {
            echo "Erreur : ".$exception->getMessage();
        }
    }
}