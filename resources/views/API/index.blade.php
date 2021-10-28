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

		#msg {
			color: green;
		}
	</style>
	
	<center>
	<h2>Formulário de Cadastro de Usuário</h2>
	<br><br><br>
		<input type="text" name="nome" placeholder="Insira seu nome" id="nome"><br><br>

		<input type="email" name="email" placeholder="Insira seu email" id="email"><br><br>

		<input type="password" name="senha" placeholder="Insira sua senha" id="senha"><br><br>

		<input type="text" name="idade" placeholder="Insira sua idade" id="idade"><br><br>

		<label>Sexo</label>
		<select name="sexo" id="sexo">
			<option value="M">Masculino</option>
			<option value="F">Feminino</option>
		</select><br><br><br><br>

		<button onclick="cadastrar()">Cadastrar</button>
	<br><br>
	<b><a href="/API/listar">Lista de Usuários</a></b>
	<br><br>
	<p id="msg"></p>
	</center>

	<script type="text/javascript">
		

		function cadastrar(){

			var nome = document.getElementById('nome').value;
			var senha = document.getElementById('senha').value;
			var idade = document.getElementById('idade').value;
			var sexo = document.getElementById('sexo').value;
			var email = document.getElementById('email').value;

			var envio = "nome="+nome+"&senha="+senha+"&idade="+idade+"&sexo="+sexo+"&email="+email;


			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
    				var resposta = JSON.parse(this.responseText);

    				document.getElementById("msg").style.color="green";

      				document.getElementById("msg").innerHTML = resposta.msg;

      				setTimeout(apagaMensagem, 3000);
    			}

    			if (this.readyState == 4 && this.status == 201) {
    				var resposta = JSON.parse(this.responseText);

    				document.getElementById("msg").style.color="red";

      				document.getElementById("msg").innerHTML = resposta.msg;


      				setTimeout(apagaMensagem, 3000);
    			}
  			};

			//xhttp.open("GET","/API/ler/");
			xhttp.open("POST","/API/cadastrar");
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			//xhttp.send()
			xhttp.send(envio);
		}

		function apagaMensagem(){
			document.getElementById('msg').innerHTML = "";
		}

	</script>
</body>
</html>