<?php

include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "select * from usuarios where profissao like '%$filtro%' order by nome";
$consulta = mysqli_query($conexao,$sql);
$registros = mysqli_num_rows($consulta);


?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
			<title>Sistema de Cadastro</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
			<link rel="stylesheet" href="styleConsulta.css">

		</head>
		<body>
			<div class="container">
				<nav>
				<ul class="menu">
				<a href="index.php"><li>Cadastro</li></a>
				<a href="consultas.php"><li>Consultas</li></a>
				</ul>
				</nav>
				<section>
				<h1>Consultas</h1>
				<hr><br><br>
				
				<form method="get" action="">
				Filtrar por profissão: <input type="text" name="filtro" class="campo" required autofocus><br>
				<input type="submit" value="Pesquisar" class="btn"><br>
				
				
				<table class="table table-striped">
				<?php
				
				print "Resultado da pesquisa com a palavra <strong>$filtro</strong><br><br>";
				print "$registros registros encontrados.";
				print "<br><br>";
				
				// print "<table>"
				while($exibirRegistros = mysqli_fetch_array($consulta)){
					
					$nome = $exibirRegistros[1];
					$email = $exibirRegistros[2];
					$profissao = $exibirRegistros[3];
					
					print"<tr>";
					
					print "<td>$nome</td>";
					print "<td>$email</td>";
					print"<td>$profissao</td>";
					
					print"</tr>";
				}
				// print "</table>"
				
				mysqli_close($conexao);
				
				?>
				</table>
				
				
				</section>
			</div>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		</body>
	</html>
