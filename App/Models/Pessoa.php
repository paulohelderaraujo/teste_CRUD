<?php

namespace App\Models;

use MF\Model\Model;

class Pessoa extends Model
{

	public function getPessoa()
	{

		$query = "SELECT * FROM pessoa
		INNER JOIN endereco ON pessoa.id_pessoa = endereco.pessoa_id_pessoa ";
		return $this->conexao->query($query)->fetchAll();
	}

	public function criarPessoa($nome, $idade, $telefone, $cpf, $dataNascimento, $cep, $logadouro, $localidade, $bairro, $uf, $complemento) {
		$query = "INSERT INTO pessoa (nome, idade, telefone, cpf, data_nascimento) VALUES (:nome, :idade, :telefone, :cpf, :dataNascimento)";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':idade', $idade);
		$stmt->bindParam(':telefone', $telefone);
		$stmt->bindParam(':cpf', $cpf);
		$stmt->bindParam(':dataNascimento', $dataNascimento);
		$stmt->execute();
	
		$pessoa_id = $this->conexao->lastInsertId();
	
		$queryEndereco = "INSERT INTO endereco (pessoa_id_pessoa, cep, logadouro, localidade, bairro, uf, complemento) VALUES (:pessoa_id, :cep, :logadouro, :localidade, :bairro, :uf, :complemento)";
		$stmtEndereco = $this->conexao->prepare($queryEndereco);
		$stmtEndereco->bindParam(':pessoa_id', $pessoa_id);
		$stmtEndereco->bindParam(':cep', $cep);
		$stmtEndereco->bindParam(':logadouro', $logadouro);
		$stmtEndereco->bindParam(':localidade', $localidade);
		$stmtEndereco->bindParam(':bairro', $bairro);
		$stmtEndereco->bindParam(':uf', $uf);
		$stmtEndereco->bindParam(':complemento', $complemento);
		$stmtEndereco->execute();
	
		return true;

		public function atualizarPessoa($id, $nome, $idade, $telefone, $cpf, $dataNascimento, $cep, $logadouro, $localidade, $bairro, $uf, $complemento) {
			$query = "UPDATE pessoa SET nome = :nome, idade = :idade, telefone = :telefone, cpf = :cpf, data_nascimento = :dataNascimento WHERE id_pessoa = :id";
			$stmt = $this->conexao->prepare($query);
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':idade', $idade);
			$stmt->bindParam(':telefone', $telefone);
			$stmt->bindParam(':cpf', $cpf);
			$stmt->bindParam(':dataNascimento', $dataNascimento);
			$stmt->execute();
		
			$queryEndereco = "UPDATE endereco SET cep = :cep, logadouro = :logadouro, localidade = :localidade, bairro = :bairro, uf = :uf, complemento = :complemento WHERE pessoa_id_pessoa = :id";
			$stmtEndereco = $this->conexao->prepare($queryEndereco);
			$stmtEndereco->bindParam(':id', $id);
			$stmtEndereco->bindParam(':cep', $cep); // Usar bindParam em vez de bindValue
			$stmtEndereco->bindParam(':logadouro', $logadouro);
			$stmtEndereco->bindParam(':localidade', $localidade);
			$stmtEndereco->bindParam(':bairro', $bairro);
			$stmtEndereco->bindParam(':uf', $uf);
			$stmtEndereco->bindParam(':complemento', $complemento);
			$stmtEndereco->execute();
		
			return true;
		}
		