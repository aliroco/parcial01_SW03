<?php 
class Materia
{
	public $nombre = null;
	public $codigo = null;
	public $semestre = 0;
	public $credito = 0;
	public $estado = false;

	function __construct(string $nombre, string $codigo, int $semestre, int $credito){
		$this->nombre = $nombre;
		$this->codigo = $codigo;
		$this->semestre = $semestre;
		$this->credito = $credito;
		$this->estado = false;
	}

	public function setEstado($estado){
		$this->estado =$estado;
	}
}
?>