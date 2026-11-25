<?php
require_once '../repositories/LivroRepository.php';

if ($_POST) {
	$livro = new Livro(
    	$_POST['titulo'],
    	$_POST['autor'],
    	$_POST['isbn']
	);

	(new LivroRepository())->criar($livro);
	header("Location: index.php");
}
?>

<form method="post">
	<input name="titulo" placeholder="Título" required><br>
	<input name="autor" placeholder="Autor" required><br>
	<input name="isbn" placeholder="ISBN" required><br>
	<button>Salvar</button>
</form>