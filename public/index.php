<?php
require_once '../repositories/LivroRepository.php';

$repo = new LivroRepository();
$livros = $repo->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Livros</title>
	<style>
    	body { font-family: Arial; margin: 40px; }
    	nav a { margin-right: 15px; text-decoration: none; font-weight: bold; }
    	table { border-collapse: collapse; width: 100%; margin-top: 20px; }
    	th, td { border: 1px solid #ccc; padding: 8px; }
    	th { background: #eee; }
	</style>
</head>
<body>

<h1>Sistema de Cadastro de Livros</h1>

<nav>
	<a href="index.php"> Listar Livros</a>
	<a href="criar.php"> Novo Livro</a>
</nav>

<table>
	<tr>
    	<th>ID</th>
    	<th>Título</th>
    	<th>Autor</th>
    	<th>ISBN</th>
    	<th>Ações</th>
	</tr>

	<?php foreach ($livros as $l): ?>
    	<tr>
        	<td><?= $l['id'] ?></td>
        	<td><?= $l['titulo'] ?></td>
        	<td><?= $l['autor'] ?></td>
        	<td><?= $l['isbn'] ?></td>
        	<td>
            	<a href="editar.php?id=<?= $l['id'] ?>"> Editar</a> |
            	<a href="excluir.php?id=<?= $l['id'] ?>"
               	onclick="return confirm('Deseja excluir?')"> Excluir</a>
        	</td>
    	</tr>
	<?php endforeach; ?>
</table>

</body>
</html>