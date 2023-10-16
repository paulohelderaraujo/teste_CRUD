<?php

namespace App\Controllers;

//os recursos do projeto
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Pessoa;


class IndexController extends Action
{

	public function index()
	{

		$pessoa = Container::getModel('Pessoa');

		$dadosPessoa = $pessoa->getPessoa();
		
		@$this->view->dados = $dadosPessoa;

		$this->render('listar', 'layout1');
	}

	public function create()
{
    // Criando um novo registro de pessoa
    $this->render('criar_formulario', 'layout1');
}

public function update($id)
{
    // Local para atualizar um registro de pessoa com o ID fornecido
    $this->render('atualizar_formulario', 'layout1');
}



}
