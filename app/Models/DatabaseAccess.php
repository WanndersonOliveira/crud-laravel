<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class DatabaseAccess
{
    //use HasFactory;
    public function create(Usuario $usuario){
    	$check = DB::table('Usuario')->insertGetId([
    		'nome' => $usuario->getNome(),
    		'idade' => $usuario->getIdade(),
    		'sexo' => $usuario->getSexo(),
    		'email' => $usuario->getEmail(),
    		'senha' => $usuario->getSenha()
    	]);

    	return $check;
    }

    public function read(){
    	$usuarios = [];

    	$usuarios = DB::table('Usuario')->get();

    	return $usuarios;
    }

    public function delete($id){
    	$check = DB::table('Usuario')->where('id','=',$id)->delete();

    	return $check;
    }

    public function update(Usuario $usuario){
    	$check = DB::table('Usuario')
    				->where('id',$usuario->getId())
    				->update(['nome' => $usuario->getNome(),
    						'idade' => $usuario->getIdade(),
    						'sexo' => $usuario->getSexo(),
    						'email' => $usuario->getEmail()]);

    	return $check;

    }
}
