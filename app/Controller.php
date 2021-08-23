<?php
abstract class Controller {
    /**
     * Permets de charger un model
     */
    public function loadModel(string $model) {
        require_once(ROOT.'models/'.$model.'.php');
        $this->$model = new $model();
    }

    /**
     * Permets le rendu des pages
     */
    public function render(string $fichier, array $data = []) {
        extract($data);
        require_once(ROOT.'views/'.strtolower(get_class($this)).'/'. $fichier . '.php');
    }
}
