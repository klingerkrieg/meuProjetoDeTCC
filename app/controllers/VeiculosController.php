<?php
use models\Veiculo;

class VeiculosController {

	
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Veiculo();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		#$send['tipos'] = [0=>"Escolha uma opção", 1=>"Usuário comum", 2=>"Admin"];

		#chama a view
		render("veiculos", $send);
	}

	
	function salvar($id=null){

		$model = new Veiculo();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("veiculos/index/$id");
	}

	function deletar(int $id){
		
		$model = new Veiculo();
		$model->delete($id);

		redirect("veiculos/index/");
	}


}
