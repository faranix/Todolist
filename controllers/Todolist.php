<?php

class Todolist extends Controller {
    public function index() {
        // Démarre la session
        session_start();

        // Utilise la methode du Controlleur général pour chargé le model
        $this->loadModel("TodolistModel");
        
        if (isset($_POST['addInTodoList'])) {
            $this->TodolistModel->insertTodo();
        }

        if (isset($_POST['deconnexion'])) {
            $this->TodolistModel->disconnect();
        }    

        $todolists = $this->TodolistModel->getAllTodolist();   

        // En cours
        foreach ($todolists as $t) {
            echo $t['id'];
            if (isset($_POST[$t['id']])) {
                echo 'test';
            }
        }


        // Vérifie si la session est ouverte
        if ($_SESSION['id']) {
            // Charge les fichiers pour le rendu
            $this->render('index', ['todolists' => $todolists]);
        } else {
            header('Location: http://localhost:8888/connexion');
        }
    }
}