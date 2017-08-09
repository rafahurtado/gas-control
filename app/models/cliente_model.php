<?php 
/**
* 
*/
	class cliente_model
	{
		private $clientes = array();
		private $db;

		function __construct()
		{
			# code...
			//$this->db = new Conectar();
		}

		public function getAll(){
			//$this->clientes = ["Pablito","Pepito","Juanito"];

			$consulta = "Select a.idcliente as id,a.nombre,a.direccion,a.telefono,b.zona from cliente as a left join zona as b on a.idzona=b.idzona order by a.nombre";
			$this->clientes = dbConecta::get_array($consulta);

	        return $this->clientes;

		}
	}
 ?>