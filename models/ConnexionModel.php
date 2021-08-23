<?php
/**
 * Model de class connexion
 */
class ConnexionModel extends Model {
    public function __construct() {
        $this->table = 'users';        
        $this->getConnection();
    }

    /**
     * Permets de récupérer les informations saise par l'utilisateur
     */
    public function getOneUserByEmail() {
        if(isset($_POST['email']) && isset($_POST['password'])) {
            $sql = 'SELECT * FROM ' . $this->table . ' WHERE email=?';
            $options = [$_POST['email']];
            $query = $this->_connexion->prepare($sql);
            $query->execute($options);
            return $query->fetch();
        }
    }
}