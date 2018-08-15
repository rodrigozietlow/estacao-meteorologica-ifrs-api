<?php
require_once 'Luminosidade.class.php';
require_once '../Model.class.php';

class LuminosidadeModel extends Model{

	public function __construct(PDO $conexao, $data=NULL){
		$this->data = $data ?? time();
		$this->conexao = $conexao;
	}

	public function buscarLuminosidade(): ?Luminosidade {
		$stmt = $this->conexao->prepare(
			"
			SELECT l.data, l.valor
			FROM
				leitor x
			   	INNER JOIN leitura l ON l.idLeitor = x.idLeitor
			    INNER JOIN sensor s ON s.idSensor = x.idSensor
			WHERE
				l.data <= :data
			    AND s.idSensor = 4
			ORDER BY l.data DESC
			LIMIT 1
			"
		);

		$stmt->execute(
			array(
				":data" => date("Y-m-d H:i",$this->data)
			)
		);

		if($temp = $stmt->fetch(PDO::FETCH_ASSOC)){
			return new Luminosidade($temp['valor'], $temp['data']);
		}
		else{
			return NULL;
		}
	}

	public function buscarMediaLuminosidade(): ?Luminosidade {
		$stmt = $this->conexao->prepare(
			"
			SELECT l.data, AVG(l.valor) as media
			FROM
				leitor x
			   	INNER JOIN leitura l ON l.idLeitor = x.idLeitor
			    INNER JOIN sensor s ON s.idSensor = x.idSensor
			WHERE
				DATE(l.data) = :data
			    AND s.idSensor = 4
			ORDER BY l.data DESC
			"
		);

		$stmt->execute(
			array(
				":data" => date("Y-m-d",$this->data)
			)
		);

		if($temp = $stmt->fetch(PDO::FETCH_ASSOC) and !empty($temp['data'])){
			return new Luminosidade($temp['media'], $temp['data']);
		}
		else{
			return NULL;
		}
	}

	public function historico($dias): Array {
		$media = array();

		$stmt = $this->conexao->prepare(
			"
			SELECT DATE(l.data) as data, AVG(l.valor) as media
			FROM
				leitor x
			   	INNER JOIN leitura l ON l.idLeitor = x.idLeitor
			    INNER JOIN sensor s ON s.idSensor = x.idSensor
			WHERE
				DATE(l.data) BETWEEN :dataInicio AND :dataFim
			    AND s.idSensor = 4
            GROUP BY DATE(l.data)
			ORDER BY l.data DESC
			"
		);

		$stmt->execute(
			array(
				":dataFim" => date("Y-m-d",$this->data),
				":dataInicio" => date("Y-m-d", strtotime("-$dias days",$this->data))
			)
		);

		while($temp = $stmt->fetch(PDO::FETCH_ASSOC)){
			$media[] = new Luminosidade($temp['media'], $temp['data']);
		}

		return $media;
	}

	public function setData($data){
		if(!is_numeric($data)){
			$data = strtotime(str_replace("/","-",$data));
		}
		$this->data = $data;
	}
}
?>
