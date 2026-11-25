<?php
require_once '../repositories/LivroRepository.php';

(new LivroRepository())->excluir($_GET['id']);
header("Location: index.php");
?>