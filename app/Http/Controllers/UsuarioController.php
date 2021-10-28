<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\UsuarioDAO;

class UsuarioController extends Controller
{
    public function index(){
    	return view('formulario');
    }

    public function cadastrar(Request $req){
    	$usuarioDAO = new UsuarioDAO();

    	$usuarioDAO->create($req->nome,$req->email,$req->senha, $req->idade,$req->sexo);

    	return redirect('/formulario');
    }



    public function ler(){
    	$usuarioDAO = new UsuarioDAO();

    	$usuarios = [];

    	$usuarios = $usuarioDAO->read();

    	return view('listadeusuarios',['usuarios' => $usuarios]);


    }

    public function deletar($id){
    	$usuarioDAO = new UsuarioDAO();

    	$check = $usuarioDAO->delete($id);

    	if($check === 1){		
    		return redirect('/listar');
    	} else {
    		return $check;
    	}
    }

    public function requisitarAlteracao($id){
    	$usuarioDAO = new UsuarioDAO();

    	$usuarios = [];

    	$usuarios = $usuarioDAO->read();

    	return view('listadeusuarios',['usuarios' => $usuarios, 'id' => $id]);
    }

    public function alterar(Request $req){
    	$usuarioDAO = new UsuarioDAO();

    	$check = $usuarioDAO->update($req->id, $req->nome,$req->email,$req->senha, $req->idade,$req->sexo);

    	if($check === 1)	{
    		return redirect('/listar');
    	} else {
    		return $check;
    	}
    }
}
