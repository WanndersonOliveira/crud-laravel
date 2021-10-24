<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulário</title>
</head>
<body>
	<style type="text/css">
		body {
			background-color: lightgrey;
		}
	</style>
	
	<center>
	<h2>Formulário de Cadastro de Usuário</h2>
	<br><br><br>
	<form method="post" action="/cadastrar">
		{{ csrf_field() }}
		<input type="text" name="nome" placeholder="Insira seu nome"><br><br>

		<input type="email" name="email" placeholder="Insira seu email"><br><br>

		<input type="password" name="senha" placeholder="Insira sua senha"><br><br>

		<input type="text" name="idade" placeholder="Insira sua idade"><br><br>

		<label>Sexo</label>
		<select name="sexo">
			<option value="M">Masculino</option>
			<option value="F">Feminino</option>
		</select><br><br><br><br>

		<input type="submit" value="Cadastrar">
	</form>
	<br><br>
	<b><a href="/listar">Lista de Usuários</a></b>
	</center>
</body>
</html>