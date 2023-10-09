<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$profissao = $_POST['profissao'];

$sql = "Insert into usuarios (nome,email,profissao) values ('$nome','$email','$profissao')";

try {
	$salvar = mysqli_query($conexao,$sql);
	 
	$linhas = mysqli_affected_rows($conexao);
} catch (Exception $ex) {

	$linhas = 0;

}

mysqli_close($conexao);


?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
			<title>Sistema de Cadastro</title>
			<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"/>
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
				<h1>Confirmação de Cadastro</h1>
				<hr><br><br>
				
				<?php
				
				if($linhas == 1){
					print "Cadastro efetuado com sucesso!";
				}else{
					print "Cadastro NÂO efetuado.<br>Já existe um usuário com este e-mail!";
				}
				
				?>
				
				
				</section>
			</div>
		</body>
	</html>
