<?php
require_once '../repositories/LivroRepository.php';

$repo = new LivroRepository();

if ($_POST) {
	$livro = new Livro(
    	$_POST['titulo'],
    	$_POST['autor'],
    	$_POST['isbn']
	);

	$repo->atualizar($_POST['id'], $livro);
	header("Location: index.php");
}

$livro = $repo->buscarPorId($_GET['id']);
?>

<form method="post">
	<input type="hidden" name="id" value="<?= $livro['id'] ?>">
	<input name="titulo" value="<?= $livro['titulo'] ?>"><br>
	<input name="autor" value="<?= $livro['autor'] ?>"><br>
	<input name="isbn" value="<?= $livro['isbn'] ?>"><br>
	<button>Atualizar</button>
</form>