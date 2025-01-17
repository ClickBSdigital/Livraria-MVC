<!-- // public/index.php -->
<?php

require_once '../config/database.php';
require_once '../app/controllers/LivroController.php';

$database = new Database();
$db = $database->getConnection();

$livroController = new LivroController($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'display';

if ($action == 'display') {
    $livroController->displayLivross();
} elseif ($action == 'add') {
    $livroController->addLivro();
} else {
    echo "Ação inválida.";
}
