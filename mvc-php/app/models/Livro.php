<!-- // app/models/Livro.php -->
<?php
// app/models/Livro.php

class Livro {
  private $conn;
  private $table_name = "livros";

  public $id_livros;  // ID do livro
  public $titulo;     // Título do livro
  public $autor;      // Autor do livro

  // Construtor que inicializa a conexão com o banco
  public function __construct($db) {
      $this->conn = $db;
  }

  // Método para buscar todos os livros
  public function getAllLivros() {
      // Corrigindo o nome da coluna de id_livos para id_livros
      $query = "SELECT id_livros, titulo, autor FROM " . $this->table_name;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;  // Retorna o resultado da consulta
  }

  // Método para adicionar um novo livro
  public function addLivro() {
      // A consulta para inserir o livro na tabela
      $query = "INSERT INTO " . $this->table_name . " (titulo, autor) VALUES (:titulo, :autor)";
      $stmt = $this->conn->prepare($query);

      // Vincula os parâmetros com os valores
      $stmt->bindParam(":titulo", $this->titulo);
      $stmt->bindParam(":autor", $this->autor);

      // Executa a query e retorna true se o livro for adicionado com sucesso
      if ($stmt->execute()) {
          return true;
      }

      return false; // Se algo der errado, retorna falso
  }
}
