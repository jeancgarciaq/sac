<?php 

namespace app\models;

require_once "app/config/bootstrap";

class mainModel
{
	//Pendiente definir los atributos
	private string $chain;
	private string $filter;

	public function setChain(string $chain) 
	{
		$this->chain = $chain;
	}

	public function setFilter(string $filter)
	{
		$this->filter = $filter;
	}

	/*----------  Funcion limpiar cadenas  ----------*/
	public function clearVariable($chain){

		$words=["<script>","</script>","<script src","<script type=","SELECT * FROM","SELECT "," SELECT ","DELETE FROM","INSERT INTO","DROP TABLE","DROP DATABASE","TRUNCATE TABLE","SHOW TABLES","SHOW DATABASES","<?php","?>","--","^","<",">","==","=",";","::"];

		$chain=trim($chain);
		$chain=stripslashes($chain);

		foreach($words as $word){
			$chain=str_ireplace($word, "", $chain);
		}

		$chain=trim($chain);
		$chain=stripslashes($chain);

		return $chain;
	}


	/*---------- Funcion verificar datos (expresion regular) ----------*/
	protected function verifyData($filter, $chain){
		if(preg_match("/^".$filter."$/", $chain))
		{
			return false;
        } else {
            return true;
        }
	}
}