<?php

class Connexion extends Controller {
    public function index() {
        // Utilise la methode du Controller général pour chargé le model
        $this->loadModel('ConnexionModel');

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $data = $this->ConnexionModel->getOneUserByEmail();

            // Vérifie si les informations sont corrects
            if ($data == false) {
                // Message d'erreur "Email incorrect !"
                $error = [ 'error' => 'Email incorrect !' ];
                $this->render('index', $error);

            } else if (password_verify($_POST['password'], $data['password'])) {
                // Démarre la session
                session_start();

                // Stock les données dans la session
                $_SESSION['id'] = $data['id'];
                $this->id = $data['id'];
                $_SESSION['email'] = $data['email'];
                
                // Envoi l'utilisateur sur la page de todolist
                header('Location: /todolist/index');
            } else {
                // Message d'erreur "Mot de passe incorrect !"
                $error = [ 'error' => 'Mot de passe incorrect !' ];
                $this->render('index', $error);
            } 
        } else {
            // Envois la page de connexion
            $this->render('index');
        }
    }
}