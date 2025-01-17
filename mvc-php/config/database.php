// config/database.php
<?php

class Database {
    private $host = "localhost"; // Defina o host
    private $db_name = "livraria"; // Nome do banco de dados
    private $username = "root"; // Usuário do banco
    private $password = ""; // Senha do banco
    private $conn;

    // Construtor para possibilitar a injeção de dependências, caso necessário
    public function __construct($host = null, $db_name = null, $username = null, $password = null) {
        if ($host) $this->host = $host;
        if ($db_name) $this->db_name = $db_name;
        if ($username) $this->username = $username;
        if ($password) $this->password = $password;
    }

    // Método para obter a conexão com o banco de dados
    public function getConnection() {
        $this->conn = null;

        try {
            // Configuração de conexão com PDO
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            // Definir o modo de erro para exceções
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // (Opcional) Definir a codificação do banco para UTF-8
            $this->conn->exec("SET NAMES 'utf8'");

        } catch (PDOException $exception) {
            echo "Erro na conexão com o banco de dados: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
