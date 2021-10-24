<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Usuario
{
    //use HasFactory;

	private $id;
    private $nome;
    private $senha;
    private $email;
    private $sexo;
    private $idade;

    public function setId($id){
    	$this->id = $id;
    }

    public function setNome($nome){
    	$this->nome = $nome;
    }

    public function setEmail($email){
    	$this->email = $email;
    }

    public function setSenha($senha){
    	$this->senha = $senha;
    }

    public function setIdade($idade){
    	$this->idade = $idade;
    }

    public function setSexo($sexo){
    	$this->sexo = $sexo;
    }

    public function getId(){
    	return $this->id;
    }

    public function getNome(){
    	return $this->nome;
    }

    public function getEmail(){
    	return $this->email;
    }

    public function getSenha(){
    	return $this->senha;
    }

    public function getIdade(){
    	return $this->idade;
    }

    public function getSexo(){
    	return $this->sexo;
    }

}
