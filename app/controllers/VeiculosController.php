<?php
use models\Veiculo;
use models\Modelo;
use models\Usuario;
use models\Motorista;

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

        #recupera a lista com todos os modelos
        $modelosModel = new Modelo();
        $send['modelos'] = $modelosModel->all();

		
        #recupera a lista com todos os usuarios
        $usuModel = new Usuario();
        $send['usuarios'] = $usuModel->all();


		#se estiver editando um veiculo
		if ($id != null){
			#recupera todos os motoristas já setados para esse veiculo
			$send['motoristas'] = $model->getMotoristas($id);
		}
		

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

		#se a id de um usuario/motorista tiver sido enviada
		if (_v($_POST,'motorista_id')){
			$model = new Motorista();
			$dados = ["usuario_id"=> $_POST['motorista_id'], "veiculo_id"=>$id];
			$model->save($dados);
		}
		
		
		redirect("veiculos/index/$id");
	}

	function deletar(int $id){
		
		$model = new Veiculo();
		$model->delete($id);

		redirect("veiculos/index/");
	}

	function deletarMotorista(int $idDoRelacionamento){
       
        $model = new Motorista();
        $rel = $model->findById($idDoRelacionamento);
        $model->delete($idDoRelacionamento);

        redirect("veiculos/index/{$rel['veiculo_id']}");
    }


}
