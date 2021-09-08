<?php
/**
 * Controlleur de la page todolist
 */
class Todolist extends Controller {

    /**
     * Permets d'afficher le rendu de la page index et de gérer les interactions 
     */
    public function index() {
        // Démarre la session
        session_start();

        // Utilise la methode du Controlleur général pour chargé le model
        $this->loadModel("TodolistModel");

            // Vérifie si la session est ouverte
            if ($_SESSION['id']) {

            // Permets d'ajouter une chose à faire
            if (isset($_POST['addInTodoList'])) {
                $this->TodolistModel->insert($_SESSION['id']);
            }

            // Permets de ce déconnecter 
            if (isset($_POST['deconnexion'])) {
                $this->TodolistModel->disconnect();
            }            

            // Permets d'afficher toute les choses à faire
            $todolists = $this->TodolistModel->findAll($_SESSION['id'], "id_users", NULL);   

            // Charge les fichiers pour le rendu
            $this->render('index', ['todolists' => $todolists]);
        } else {
            // Sinon renvoie l'utilisateur à la page d'accueil
            header('Location: /connexion/index');
        }
    }
    
    /**
     * Permets de supprimer une todolist
     */
    public function delete($id) {
        // Démarre la session
        session_start();

        $this->loadModel("TodolistModel");

        if ($_SESSION['id']) {
            $this->TodolistModel->delete($id, "sous_todolist");

            header('Location: /todolist/index');
            
        } else {
            header('Location: /connexion/index');
        }

    }

    /**
     * Permets de modifier une todolist
     */
    public function modify($id) {
        // Démarre la session
        session_start();

        $this->loadModel("TodolistModel");

        if ($_SESSION['id']) {
            $this->TodolistModel->modify($id);

            header('Location: /todolist/index');
        } else {
            header('Location: /connexion/index');
        }
    }
}