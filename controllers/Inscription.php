<?php
/**
 * Controlleur de la page inscription
 */
class Inscription extends Controller {
    public function index() {
        // Utilise la methode du Controlleur général pour chargé le model
        $this->loadModel('InscriptionModel');

        // Vérifie si la variable existe
        if(isset($_POST['email-inscription'])) {
            $this->InscriptionModel->insertOneUser();
        }

        // Charge les fichiers pour le rendu
        $this->render("index");

    }
}