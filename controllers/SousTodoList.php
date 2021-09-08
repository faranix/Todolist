<?php 

class SousTodoList extends Controller {
    /**
     * Permets d'afficher le rendu de la page todo et de gérer les interactions 
     */
    public function index($id) {
        // Démarre la session
        session_start();

        $this->loadModel("SousTodoListModel");

        if ($_SESSION['id']) {

            // Permets de ce déconnecter 
            if (isset($_POST['deconnexion'])) {
                $this->SousTodoListModel->disconnect();
            } 
            
            // Permets d'envoyer une tâche à faire sur la todo ciblé à la base de donnée
            if (isset($_POST['addInSousTodoList'])) {
                $this->SousTodoListModel->insert($id);
            }

            // Permets de récupérer les données de la todo sélectionner 
            $todoList = $this->SousTodoListModel->find($id);
            
            // Permets de récupérer toute les sous tâches de la todo sélectionner
            $sousTodoList = $this->SousTodoListModel->findAll($id, "id_todolist", NULL);


            $this->render('index', ["sousTodoList" => $sousTodoList]);
        } else {
            header('Location: /connexion/index');
        }
    }

    /**
     * Permets de supprimer une sous-todolist
     */
    public function delete($id) {
        // Démarre la session
        session_start();

        $this->loadModel("SousTodoListModel");

        if ($_SESSION['id']) {
            $this->SousTodoListModel->delete($id, NULL);

            header('Location: /todolist/index');
        } else {
            header('Location: /connexion/index');
        }
    }

    /**
     * Permets de modifier une sous-todolist
     */
    public function modify($id) {
        // Démarre la session
        session_start();

        $this->loadModel("SousTodoListModel");

        if ($_SESSION['id']) {
            $this->SousTodoListModel->modify($id);

            header('Location: /todolist/index');
        } else {
            header('Location: /connexion/index');
        }
    }
}
