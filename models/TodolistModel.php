<?php

class TodolistModel extends Model {
    public function __construct() {
        $this->table = "todolist";
        $this->id = $_SESSION['id'];
        $this->getConnection();
    }

    /**
     * Permet de ce déconnecté
     */
    public function disconnect() {
        unset($_SESSION);
        session_destroy();
        session_write_close();
        header("Location: http://localhost:8888/connexion");
    }

    /**
     * Permet de récupérer une todolist
     */
    public function getAllTodolist() {
        $sql = 'SELECT * FROM ' . $this->table .' WHERE id_users=' . $this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * Permet d'envoyer une todo à la base de donnée
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
     * Permet de Supprimer une Todo
     */
    public function deleteTodo() {
        // En cours
    }
}