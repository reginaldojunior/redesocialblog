<?php 

class posts extends conexao{

	public function loadPostsUserLogged() {
		$idlist = $this->loadIdsFriends();

		$db = $this->conn;

		$in  = str_repeat('?,', count($idlist) - 1) . '?';
		$sql = "SELECT * FROM post WHERE id_usuario IN ($in)";
		$stm = $db->prepare($sql);
		$stm->execute($idlist);
		$data = $stm->fetchAll();

		return $data;
	}

	public function loadIdsFriends() {
		$ids = array();

		$stmt = $this->conn->prepare("SELECT id_usuario_filho FROM usuario_relaciona_usuario WHERE id_usuario_pai = :id AND ativo = 1");
		$dados = array(':id' => $_SESSION['usuario']['id']);

		$stmt->execute($dados);

		$retorno = $stmt->fetchAll();

		foreach ($retorno as $i => $valor) {
			$ids[] = $valor['id_usuario_filho'];
		}		

		return $ids;
	}

}