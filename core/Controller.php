<?php
namespace Formacom\Core;
// app/core/Controller.php
abstract class Controller {
    abstract public function index(...$params);

    protected function render($view, $data = []) {
        // Extraemos las variables del array $data para que estén disponibles en la vista
        extract($data);
        
        // Obtenemos el nombre del controlador actual (por ejemplo, 'UsuarioController')
        $controllerFullName = get_class($this);
        // Convertimos a minúsculas y removemos la palabra "Controller" para obtener el nombre de la carpeta
        $controllerName = strtolower(str_replace("Controller", "", $controllerFullName));
        
        // Construimos la ruta de la vista
        $viewPath = "../app/views/{$controllerName}/{$view}.php";
        
        // Verificamos si la vista existe
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            // En caso de no encontrar la vista, podrías lanzar una excepción o mostrar un error
            echo "La vista {$viewPath} no existe.";
        }
    }
}
