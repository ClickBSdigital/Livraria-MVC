<?php
// app/controllers/LivroController.php

include_once 'app/models/Livro.php';

class LivroController {
    private $livro;

    // Construtor para inicializar o modelo Livro
    public function __construct($db) {
        $this->livro = new Livro($db);
    }

    // Método para exibir todos os livros
    public function displayLivros() {
        // Recupera todos os livros do banco de dados
        $livros = $this->livro->getAllLivros();
        // Inclui a view que vai mostrar a lista de livros
        include_once 'app/views/livros.php';
    }

    // Método para adicionar um novo livro
    public function addLivro() {
        // Verifica se o formulário foi enviado via POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Valida os dados recebidos
            if (empty($_POST['titulo']) || empty($_POST['autor'])) {
                // Exibe uma mensagem de erro caso algum campo esteja vazio
                echo "Todos os campos são obrigatórios.";
                return;
            }

            // Preenche as propriedades do objeto Livro com os dados recebidos
            $this->livro->titulo = $_POST['titulo'];
            $this->livro->autor = $_POST['autor'];

            // Tenta adicionar o livro ao banco de dados
            if ($this->livro->addLivro()) {
                // Se a inserção for bem-sucedida, redireciona para a página principal
                header("Location: /");
                exit;
            } else {
                // Caso haja erro ao adicionar o livro, exibe uma mensagem de erro
                echo "Erro ao adicionar livro. Tente novamente.";
            }
        }
    }
}
