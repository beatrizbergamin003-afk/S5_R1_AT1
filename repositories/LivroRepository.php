<?php 
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Livro.php';
require_once __DIR__ . '/../interfaces/RepositoryInterface.php';

class LivroRepository implements RepositoryInterface{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::conectar();
    }

    #[Override]
    public function criar($objeto)
    {
        $sql = "INSERT INTO livros (titulo, autor, isbn) VALUES (:t, :a, :i)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':t' => $objeto->getTitulo(),
            ':a' => $objeto->getAutor(),
            ':i' => $objeto->getIsbn()
        ]);
    }

    #[Override]
    public function listar()
    {
        $sql = "SELECT * FROM livros ORDER BY id";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    #[Override]
    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM livros WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    #[Override]
    public function atualizar($id, $objeto)
    {
        $sql = "UPDATE livros SET titulo=:t, autor=:a, isbn=:i WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':t' => $objeto->getTitulo(),
            ':a' => $objeto->getAutor(),
            ':i' => $objeto->getIsbn(),
            ':id' => $id
        ]);
    }

    #[Override]
    public function excluir($id)
    {
        $sql = "DELETE FROM livros WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>