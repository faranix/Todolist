<?php

class TodolistModel extends Model {
    public function __construct() {
        $this->table = "todolist";
        $this->id = $_SESSION['id'];
        $this->getConnection();
    }

    // Fonction Général

    /**
     * Permet de ce déconnecté
     */
    public function disconnect() {
        unset($_SESSION);
        session_destroy();
        session_write_close();
        header("Location: http://localhost:8888/connexion");
    }

    // Todolist

    /**
     * Permets de récupérer une todolist par rapport à un utilisateur
     */
    public function getAllTodolist() {
        $sql = 'SELECT * FROM ' . $this->table .' WHERE id_users=' . $this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Permets d'envoyer une todo à la base de donnée
     */
    public function insertTodo() {
        // Récupère la date actuelle en format anglais pour mySql
        $dateNow = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `todolist`(`title`, `date_time`, `id_users`) VALUES (?, ?, ?)";
        $options = [$_POST["addInTodoList"], $dateNow , $this->id];
        $query = $this->_connexion->prepare($sql);
        $query->execute($options);
    }

    /**
     * Permets de Supprimer une Todo
     */
    public function getOneTodolist($id) {
        $sql = "SELECT * FROM todolist WHERE id=?";
        $options = [$id];
        $query = $this->_connexion->prepare($sql);
        $query->execute($options);
        return $query->fetch();
    }

    // Sous todolist

    /**
     * Permets d'envoyer une tâche à faire sur la todo ciblé à la base de donnée
     */
    public function insertSousTodo($id) {
        // Récupère la date actuelle en format anglais pour mySql
        $dateNow = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `sous_todolist`(`title`, `date_time`, `id_todolist`) VALUES (?, ?, ?)";
        $options = [$_POST["addInSousTodoList"], $dateNow , $id];
        $query = $this->_connexion->prepare($sql);
        $query->execute($options);
    }

    /**
     * Permets d'afficher toute les tâche à faire sur la todo ciblé
     */
    public function getAllSousTodolist($id) {
        $this->table = 'sous_todolist';
        
        $sql = 'SELECT * FROM ' . $this->table .' WHERE id_todolist=' . $id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}