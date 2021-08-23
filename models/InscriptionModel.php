<?php
class InscriptionModel extends Model {
    public function __construct() {
        $this->table = 'users';
        $this->getConnection();
    }

    public function insertOneUser() {
        if(isset($_POST['email-inscription']) && isset($_POST['password-inscription'])) {
            // Hash du mot de passe
            $passwordCrypte = password_hash($_POST['password-inscription'], PASSWORD_BCRYPT);

            // Requête sql pour inscrire un utilisateur
            $sql = "INSERT INTO "  . $this->table . " (email, password) VALUES (?, ?)";
            $option = [$_POST['email-inscription'], $passwordCrypte];
            $query = $this->_connexion->prepare($sql);
            $query->execute($option);

            // Redirection page de connection
            header('Location: http://localhost:8888/connexion');
        };
    }

}