<?php
use models\Obra;
use models\Tipo;
use models\Autor;
use models\Usuario;

class ObrasController {

	#construtor, é iniciado sempre que a classe é chamada
	function __construct() {
		#se nao existir é porque nao está logado
		if (!isset($_SESSION["user"])){
			redirect("autenticacao");
			die();
		}
	}

	
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

		#recupera a lista com todos os usuarios
        $usuModel = new Usuario();
        $send['usuarios'] = $usuModel->all();

		#se estiver editando um obra
        if ($id != null){
            #recupera todos as avaliações já setadas para esse obra
            $send['autores'] = $model->getAutores($id);
        }



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

		#se a id de um usuario/motorista tiver sido enviada
        if (_v($_POST,'autor_id')){
            $model = new Autor();
            $dados = ["usuario_id"=> $_POST['autor_id'], "obra_id"=>$id];
            $model->save($dados);
        }

		
		redirect("obras/index/$id");
	}

	function deletar(int $id){
		
		$model = new Obra();
		$model->delete($id);

		redirect("obras/index/");
	}

	function deletarAutor(int $idDoRelacionamento){
       
        $model = new Autor();
        $rel = $model->findById($idDoRelacionamento);
        $model->delete($idDoRelacionamento);

        redirect("obras/index/{$rel['obra_id']}");
    }



}
