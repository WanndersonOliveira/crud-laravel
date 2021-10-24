<?php

namespace App\Models;

use App\Models\Usuario;
use App\Models\DatabaseAccess;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class UsuarioDAO
{
    //use HasFactory;
    public function create($nome,$email,$senha,$idade, $sexo){

    	$usuario = new Usuario();

    	$usuario->setNome($nome);
    	$usuario->setEmail($email);
    	$usuario->setSenha($senha);
    	$usuario->setIdade($idade);
    	$usuario->setSexo($sexo);


    	$database = new DatabaseAccess();

    	$check = $database->create($usuario);

    	return $check;

    }

    public function read(){
    	$database = new DatabaseAccess();

    	$usuarios = [];
    	$usuarios = $database->read();

    	return $usuarios;
    }

    public function delete($id){
    	$database = new DatabaseAccess();

    	$check = $database->delete($id);

    	return $check;
    }

    public function update($id, $nome,$email,$senha,$idade, $sexo){
    	$usuario = new Usuario();

    	$usuario->setId($id);
    	$usuario->setNome($nome);
    	$usuario->setEmail($email);
    	$usuario->setSenha($senha);
    	$usuario->setIdade($idade);
    	$usuario->setSexo($sexo);


    	$database = new DatabaseAccess();

    	$check = $database->update($usuario);

    	return $check;
    }
}
