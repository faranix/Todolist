<?php
// On génère une constante qui contiendra le chemin vers index.php
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');

// On sépare les paramètres
$params = explode('/', $_GET['p']);

// Est-ce qu'un paramètre existe
if($params[0] != '') {
    // Récupérer le nom du controller 
    $controller = ucfirst($params[0]);

    $action = isset($params[1]) ? $params[1] : 'index';

    // Permet de récuperer le bon fichier 
    require_once(ROOT."controllers/".$controller.".php");

    $controller = new $controller();

    // Vérifie si la méthode dans la class existe 
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        http_response_code(404);
        echo "La page demandée n'existe pas ";
    }
} else {
    // Redirige automatiquement sur la page d'accueil
    header("Location: http://localhost:8888/connexion");
}


