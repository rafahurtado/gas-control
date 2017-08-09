<?php 	

/**
* 
*/
class dashboard_model
{
	private $saludo = "hola mundo PHP";

	public function __construct()
	{
		# code...
		#$this->saludo =  "hola mundo PHP";
	}

	public function sayHello(){
		#$result = $this->saludo;
		return $this->saludo;
	}

}



 ?>