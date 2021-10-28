<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Usuários</title>
</head>
<body onload="carregar()">
	<style type="text/css">
		body {
			background-color: lightgrey;
		}

		#msg {
			color: green;
		}
	</style>

	<script type="text/javascript">
        var tamanho = 0;

		function carregar() {
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {

    				const tabela = document.getElementById('tabela');

    				var dados = JSON.parse(this.responseText);

                    var tamanho = dados.length;

    				for(var i = 0; i < dados.length; i++){

    					var tr = document.createElement('tr');
                        tr.id = "tr"+i;

    					var del = document.createElement('button');
    					var alt = document.createElement('button');
    					del.id = "del_"+dados[i].id;
    					del.innerHTML = "Ação"
    					del.setAttribute("onclick", "deletar("+dados[i].id+")");

    					alt.innerHTML = "Ação";
    					alt.setAttribute("onclick", "alterar("+dados[i].id+")");


    					var td = [];

    					td[0] = document.createElement('td');

    					td[1] = document.createElement('td');

    					td[2] = document.createElement('td');

    					td[3] = document.createElement('td');
    					td[4] = document.createElement('td');
    					td[5] = document.createElement('td');



    					td[0].innerHTML = dados[i].nome;
    					td[1].innerHTML = dados[i].idade;
    					td[2].innerHTML = dados[i].sexo;
    					td[3].innerHTML = dados[i].email;
    					td[4].appendChild(del);
    					td[5].appendChild(alt);

    					tr.appendChild(td[0]);
    					tr.appendChild(td[1]);
    					tr.appendChild(td[2]);
    					tr.appendChild(td[3]);
    					tr.appendChild(td[4]);
    					tr.appendChild(td[5]);

    					tabela.appendChild(tr);
    				}
    			}

    			if (this.readyState == 4 && this.status == 201) {
    				var resposta = JSON.parse(this.responseText);

    				document.getElementById("msg").style.color="red";

      				document.getElementById("msg").innerHTML = resposta.msg;


      				setTimeout(apagaMensagem, 3000);
    			}
  			};

			xhttp.open("GET","/API/ler/");
			xhttp.send();

		}

		function deletar(id){
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
    				var msg = JSON.parse(this.responseText);

    				document.getElementById("msg").style.color="green";
    				document.getElementById("msg").innerHTML = msg["msg"];

                    for(var i = 0; i < tamanho; i++){
                        document.getElementById('tr'+i).remove();
                    }

                    setTimeout(function(){
                            window.location.href = "http://localhost:8000/API/listar";
                        },5000);

    				setTimeout(apagaMensagem,3000);
    			}

                if (this.readyState == 4 && this.status == 210) {
                    var msg = JSON.parse(this.responseText);

                    document.getElementById("msg").style.color="red";
                    document.getElementById("msg").innerHTML = msg["msg"];

                    setTimeout(apagaMensagem,3000);
                }
    		};

    		xhttp.open("DELETE","/API/deletar/"+id);
			xhttp.send();
		}

		function alterar(id){
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
    				var alterar = document.getElementById('alterar');

    				var dado = JSON.parse(this.responseText);

    				var input = [];

    				input[0] = document.createElement('input');

    				input[1] = document.createElement('input');

    				input[2] = document.createElement('input');

    				input[3] = document.createElement('input');
    				input[4] = document.createElement('button');

    				input[0].type = "text";
    				input[1].type = "text";
    				input[2].type = "text";
    				input[3].type = "text";

    				input[0].id = "nome";
    				input[1].id = "email";
    				input[2].id = "idade";
    				input[3].id = "sexo";
                    input[4].id = "btn";

    				input[0].value = dado.nome;
    				input[1].value = dado.email;
    				input[2].value = dado.idade;
    				input[3].value = dado.sexo;
    				input[4].innerHTML = "Alterar";
                    input[4].setAttribute("onclick", "atualizar("+dado.id+")");

    				alterar.appendChild(input[0]);
    				alterar.appendChild(input[1]);
    				alterar.appendChild(input[2]);
    				alterar.appendChild(input[3]);
    				alterar.appendChild(input[4]);

    			}
    		};

    		xhttp.open("GET","/API/selecionar/"+id);
			xhttp.send();
		}

        function atualizar(id){
            var nome = document.getElementById('nome').value;
            var email = document.getElementById('email').value;
            var sexo = document.getElementById('sexo').value;
            var idade = document.getElementById('idade').value;


            const xhttp = new XMLHttpRequest();
            xhttp.open("PATCH","/API/alterar/");

            xhttp.setRequestHeader('Accept',"application/json");
            xhttp.setRequestHeader('Content-Type',"application/json");
            xhttp.setRequestHeader('id',id);
            xhttp.setRequestHeader('nome',nome);
            xhttp.setRequestHeader('sexo',sexo);
            xhttp.setRequestHeader('email',email);
            xhttp.setRequestHeader('idade',idade);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 3) {
                        var msg = JSON.parse(this.responseText);

                        document.getElementById("msg").style.color="green";
                        document.getElementById("msg").innerHTML = msg["msg"];

                        setTimeout(function(){
                            window.location.href = "http://localhost:8000/API/listar";
                        },5000);

                        setTimeout(apagaMensagem,3000);
                    }

                if (this.readyState == 4 && this.status == 205) {
                        var msg = JSON.parse(this.responseText);

                        document.getElementById("msg").style.color="red";
                        document.getElementById("msg").innerHTML = msg["msg"];

                        setTimeout(apagaMensagem,3000);
                    }
            };

            xhttp.send();


            document.getElementById('nome').remove();
            document.getElementById('email').remove();
            document.getElementById('sexo').remove();
            document.getElementById('idade').remove();
            document.getElementById('btn').remove();
        }

		function apagaMensagem(){
			document.getElementById('msg').innerHTML = "";
		}
	</script>


    <b><a href="/API">Cadastrar</a></b>
	<center>
	<h2>Lista de Usuários Cadastrados</h2>
	<br><br>

	<table border="1" id="tabela">
		<tr>
			<td><b>Nome</b></td>
			<td><b>Idade</b></td>
			<td><b>Sexo</b></td>
			<td><b>Email</b></td>
			<td><b>Deletar</b></td>
			<td><b>Alterar</b></td>
		</tr>
	</table>
	<br>
	<br>
	<div id="alterar"></div>
	<p id="msg"></p>
	</center>
</body>
</html>