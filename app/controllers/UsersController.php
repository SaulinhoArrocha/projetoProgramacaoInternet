<?php
use models\User;

/**
* Tutorial CRUD
* Autor:Alan Klinger 05/06/2017
*/

#A classe devera sempre iniciar com letra maiuscula
#terá sempre o mesmo nome do arquivo
#e precisa terminar com a palavra Controller
class UsersController {

	#construtor, é iniciado sempre que a classe é chamada
	function __construct() {
		#se nao existir é porque nao está logado
		if (!isset($_SESSION["user"])){
			redirect("autenticacao");
			die();
		}


		#proibe o usuário de entrar caso não tenha autorização
		if ($_SESSION['user']['tipo'] < User::ADMIN_USER){
			header("HTTP/1.1 401 Unauthorized");
			die();
		}
	}

	/**
	* Para acessar http://localhost/NOMEDOPROJETO/users/index
	**/
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new User();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

		#$send['tipos'] = [0=>"Escolha uma opção", 1=>"Usuário comum", 2=>"Admin"];
		$send['tipos'] = User::$userTypes;

		#chama a view
		render("users", $send);
	}

	
	function salvar($id=null){

		$model = new User();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}
		
		redirect("users/index/$id");
	}

	function deletar(int $id){
		
		$model = new User();
		$model->delete($id);

		redirect("users/index/");
	}


}
