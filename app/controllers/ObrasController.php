<?php
use models\Obra;
use models\Tipo;

class ObrasController {

	
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Obra();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		#$send['tipos'] = [0=>"Escolha uma opção", 1=>"Usuário comum", 2=>"Admin"];

		#recupera a lista com todos os modelos
        $modelosModel = new Tipo();
        $send['tipos'] = $modelosModel->all();


		#chama a view
		render("obras", $send);
	}

	
	function salvar($id=null){

		$model = new Obra();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("obras/index/$id");
	}

	function deletar(int $id){
		
		$model = new Obra();
		$model->delete($id);

		redirect("obras/index/");
	}


}
