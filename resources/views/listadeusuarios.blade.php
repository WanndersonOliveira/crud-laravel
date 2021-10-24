<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Usuários</title>
</head>
<body>
	<style type="text/css">
		body {
			background-color: lightgrey;
		}	
	</style>

	<center>
	<h2>Lista de Usuários Cadastrados</h2>
	<br><br><br>
	<table border="1">
		<tr>
			<td><b>Nome</b></td>
			<td><b>Idade</b></td>
			<td><b>Email</b></td>
			<td><b>Sexo</b></td>
			<td><b>Deletar</b></td>
			<td><b>Alterar</b></td>
		</tr>

		@foreach ($usuarios as $usuario)
			@if (isset($id))
				@if($usuario->id == $id)
				<form method="post" action="/alterar">
					{{ csrf_field() }}
				<tr>
					<input type="hidden" name="id" value="{{ $id }}">
					<td><input value="{{ $usuario->nome }}" name="nome"></td>
					<td><input value="{{ $usuario->idade }}" name="idade"></td>
					<td><input value="{{ $usuario->email }}" name="email"></td>
					<td><input value="{{ $usuario->sexo }}" name="sexo"></td>
					<td><a href="/deletar/{{ $usuario->id }}">Ação</a></td>
					<td><input type="submit" value="Cadastrar"></td>
				</tr>
				</form>
				@else
					<tr>
						<td>{{ $usuario->nome }}</td>
						<td>{{ $usuario->idade }} anos</td>
						<td>{{ $usuario->email }}</td>
						<td>{{ $usuario->sexo }}</td>
						<td><a href="/deletar/{{ $usuario->id }}">Ação</a></td>
						<td><a href="/alterar/{{ $usuario->id }}">Ação</a></td>
					</tr>

				@endif

			@else
				<tr>
					<td>{{ $usuario->nome }}</td>
					<td>{{ $usuario->idade }} anos</td>
					<td>{{ $usuario->email }}</td>
					<td>{{ $usuario->sexo }}</td>
					<td><a href="/deletar/{{ $usuario->id }}">Ação</a></td>
					<td><a href="/alterar/{{ $usuario->id }}">Ação</a></td>
				</tr>
			@endif
		@endforeach
	</table>
	<br><br>
	<b><a href="/formulario">Formulário de Cadastro</a></b>
	</center>
</body>
</html>