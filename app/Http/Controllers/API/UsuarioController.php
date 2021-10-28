<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\API\Usuario;

class UsuarioController extends Controller
{

	/*
	*	Status Codes
	*	200 -> OK
	*	404 -> Not Found
	*	201 -> Erro no cadastro
	*	205 -> Erro na atualização
	*	210 -> Erro na deleção
	*/

    public function index(){
    	return view('API/index');
    }

    public function listar(){
    	return view('API/lista');
    }

    public function cadastrar(Request $req){
    	$obj = array("msg" => "");

    	$usuario = new Usuario;

    	$usuario->nome = $req->nome;
    	$usuario->sexo = $req->sexo;
    	$usuario->senha = $req->senha;
    	$usuario->idade = $req->idade;
    	$usuario->email = $req->email;

    	if($usuario->save()){
    		$obj['msg'] = "Usuário cadastrado com sucesso";

    		return response()->json($obj, 200);
    	} else {
    		$obj['msg'] = "Algum erro ocorreu no cadastro de usuário";

    		return response()->json($obj, 201);
    	}

    }

    public function ler(){

    	$obj = array("msg" => "Usuário não encontrado");
    	$usuarios = Usuario::all();

    	if(count($usuarios) > 0){
    		foreach($usuarios as $usuario){
    			$usuario->senha = "";
    		}
    	} else {
    		return response()->json($obj, 404);
    	}


    	return response($usuarios->toJson(),200);
    }

    public function selecionar($id){
    	$obj = array("msg" => "Usuário não encontrado");

    	$usuario = Usuario::find($id);

    	if($usuario === null){
    		$json = json_encode($obj);
    		return response()->json($obj,404);
    	}

    	return response($usuario->toJson(),200);
    }

    public function deletar($id){
    	$obj = array("msg" => "Algum erro ocorreu na deleção do usuário ".$id);

    	$usuario = Usuario::find($id);

    	if($usuario->delete()){
    		$obj['msg'] = "O usuário foi deletado com sucesso.";

    		return response()->json($obj, 200);
    	}

    	return response()->json($obj, 210);
    }

    public function alterar(Request $req){
    	$obj = array("msg" => "Usuário ".$req->header('id')." não encontrado");

    	$usuario = Usuario::find($req->header('id'));
    	$usuario->nome = $req->header('nome');
    	$usuario->email = $req->header('email');
    	$usuario->idade = $req->header('idade');

    	$usuario->save();

    	if($usuario === null){
    		return response()->json($obj, 404);
    	}

    	if($usuario->save()){
    		$obj['msg'] = "Usuário atualizado com sucesso.";
    		return response()->json($obj, 200);
    	}

    	$obj['msg'] = "Algum erro ocorreu na alteração do usuário.";

    	return response()->json($obj, 205);
    }
}
