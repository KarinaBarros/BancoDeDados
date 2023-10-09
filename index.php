<?php

include_once("conexao.php");

$sql = "select * from profissao";
$consulta = mysqli_query($conexao,$sql);
$registros = mysqli_num_rows($consulta);


?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
			<title>Sistema de Cadastro</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
			
			rel="stylesheet"/>
			<link rel="stylesheet" href="style.css">
			
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
				<h1>Cadastro de Usuários</h1>
				<hr><br><br>
				
				<form method="post" action="processa.php">
				<input type="submit" value="Salvar" class="btn btn-primary">
				<input type="reset" value="Limpar" class="btn btn-default">
				<br><br>
				
				<div>
					<label class="form-label">Nome:</label>
					<input type="text" name="nome" class="form-control" maxlength="40" required autofocus>
				</div>

				<div>
					<label class="form-label">Email:</label>
					<input type="email" name="email" class="form-control" maxlength="50" required>
				</div>

				
				<div>
					<label class="form-label">Profissão:</label>

					<select name="profissao" class="form-control" >
					<?php
					while($exibirRegistros = mysqli_fetch_array($consulta)) {
						$nome = $exibirRegistros[1];
						print "<option value='$nome'>$nome</option>";
					}
					mysqli_close($conexao);
					
					?>
					</select>
				</div>
				</form>
				</section>
			</div>
		</body>
	</html>
