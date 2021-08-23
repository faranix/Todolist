<?php

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
                $this->TodolistModel->insertTodo();
            }

            // Permets de ce déconnecter 
            if (isset($_POST['deconnexion'])) {
                $this->TodolistModel->disconnect();
            }            

            // Permets d'afficher toute les choses à faire
            $todolists = $this->TodolistModel->getAllTodolist();   

            // Charge les fichiers pour le rendu
            $this->render('index', ['todolists' => $todolists]);
        } else {
            // Sinon renvoie l'utilisateur à la page d'accueil
            header('Location: /connexion/index');
        }
    }
    
    public function todo($id) {
        // Démarre la session
        session_start();

        $this->loadModel("TodolistModel");

        if ($_SESSION['id']) {

            // Permets de ce déconnecter 
            if (isset($_POST['deconnexion'])) {
                $this->TodolistModel->disconnect();
            } 
            
            // Permets d'envoyer une tâche à faire sur la todo ciblé à la base de donnée
            if (isset($_POST['addInSousTodoList'])) {
                $this->TodolistModel->insertSousTodo($id);
            }

            // Permets de récupérer les données de la todo sélectionner 
            $todoList = $this->TodolistModel->getOneTodolist($id);
            
            // Permets de récupérer toute les sous tâches de la todo sélectionner
            $sousTodoList = $this->TodolistModel->getAllSousTodolist($id);


            $this->render('todo', ['todoList' => $todoList, "sousTodoList" => $sousTodoList]);
        } else {
            header('Location: /connexion/index');
        }
    }

    public function delete($id) {
        // Démarre la session
        session_start();

        $this->loadModel("TodolistModel");

        if ($_SESSION['id']) {
            $this->TodolistModel->deleteTodo($id);

            header('Location: /todolist/index');
            
        } else {
            header('Location: /connexion/index');
        }

    }

    public function modify($id) {
        // Démarre la session
        session_start();

        $this->loadModel("TodolistModel");

        if ($_SESSION['id']) {
            $this->TodolistModel->modifyTodo($id);

            header('Location: /todolist/index');
        } else {
            header('Location: /connexion/index');
        }
    }

    public function deleteSousTodo($id) {
        // Démarre la session
        session_start();

        $this->loadModel("TodolistModel");

        if ($_SESSION['id']) {
            $this->TodolistModel->deleteSousTodo($id);

            header('Location: /todolist/index');
        } else {
            header('Location: /connexion/index');
        }
    }

    public function modifySousTodo($id) {
        // Démarre la session
        session_start();

        $this->loadModel("TodolistModel");

        if ($_SESSION['id']) {
            $this->TodolistModel->modifySousTodo($id);

            header('Location: /todolist/index');
        } else {
            header('Location: /connexion/index');
        }
    }
}