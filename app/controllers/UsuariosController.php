<?php
use models\Usuario;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class UsuariosController {

	#construtor, é iniciado sempre que a classe é chamada
	function __construct() {
		#se nao existir é porque nao está logado
		if (!isset($_SESSION["user"])){
			redirect("autenticacao");
			die();
		}
	}
		
	/**
	* Para acessar http://localhost/NOMEDOPROJETO/usuarios/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Usuario();
		
		
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
		render("usuarios", $send);
	}

	
	function salvar($id=null){

		$model = new Usuario();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("usuarios/index/$id");
	}

	function deletar(int $id){
		
		$model = new Usuario();
		$model->delete($id);

		redirect("usuarios/index/");
	}


}
