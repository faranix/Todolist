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
    protected $table;

    public function __construct() {
        $this->getConnection();
    }

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

    /**
     * Permet de ce déconnecté
     */
    public function disconnect() {
        unset($_SESSION);
        session_destroy();
        session_write_close();
        header("Location: /connexion/index");
    }

    /**
     * Permet de récupérer des items
     *
     * @param string|null $order
     * @param integer $id_users
     * @return array
     */
    public function findAll(int $id, string $whereId, ?string $order): array {
        $sql = "SELECT * FROM {$this->table} WHERE {$whereId}={$id}";

        if ($order) {
            $sql .= " ORDER BY {$order}";
        }

        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $items = $query->fetchAll();
        return $items;
    }

    /**
     * Permet de récupérer un item
     *
     * @param [type] $id
     * @return array
     */
    public function find($id) {
    $sql = "SELECT * FROM {$this->table} WHERE id=?";
    $options = [$id];
    $query = $this->_connexion->prepare($sql);
    $query->execute($options);
    $item = $query->fetchAll();
    return $item;
    }

    /**
     * Permet inserer un item
     *
     * @param integer $id
     * @return void
     */
    public function insert(int $id) {

        if (isset($_POST['addInTodoList'])) {
            $text = $_POST['addInTodoList'];
            $sqlId = "id_users";
        } else {
            $text = $_POST['addInSousTodoList'];
            $sqlId = "id_todolist";
        }

        // Récupère la date actuelle en format anglais pour mySql
        $dateNow = date('Y-m-d H:i:s');

        $sql = "INSERT INTO {$this->table} (`title`, `date_time`, `{$sqlId}`) VALUES (?, ?, ?)";
        $options = [$text, $dateNow , $id];
        $query = $this->_connexion->prepare($sql);
        return $query->execute($options);
    }

    /**
     * Permet de supprimer un item
     *
     * @param integer $id
     * @param string|null $secondTable
     * @return void
     */
    public function delete(int $id, ?string $secondTable) {  
        // Supprime tout les sous_todolist liée à la todolist  

        if ($secondTable) {
            $sql = "DELETE FROM {$secondTable} WHERE id_todolist=?";
            $options = [$id];
            $query = $this->_connexion->prepare($sql);
            $query->execute($options);
        }

        // Supprime la todolist
        $sql = "DELETE FROM {$this->table} WHERE id=?";
        $options = [$id];
        $query = $this->_connexion->prepare($sql);
        return $query->execute($options);
    }

    /**
     * Permet de modifié un item
     *
     * @param [type] $id
     * @return void
     */
    public function modify($id): void {

        if (isset($_POST['editTodo'])) {
            $text = $_POST['editTodo'];
        } else {
            $text = $_POST['editSousTodo'];
        }

        $sql = "UPDATE {$this->table} SET title=? WHERE id=?";
        $options = [$text, $id];
        $query = $this->_connexion->prepare($sql);
        $query->execute($options);
    }
}