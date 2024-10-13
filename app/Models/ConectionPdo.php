<?php
/**
	* La clase ConectionPdo esta creada para poder reutilizar la conexión a las bases de datos alojadas en un servidor off-line
	* @author Jean Carlo Garcia
 	* @version 1.0
 	* @date 2024-08-03
*/

namespace Class;

//Importamos la clase mysqli
use PDO;

class ConectionPdo {

	/**
		* El método constructor agrega las variables de clases
		* $host es una variable tipo string que recibe como parámetro el valor de la url del servidor
		* $user es una variable tipo string que recibe como parámetro el valor del usuario de la base de datos
		* $pass es una variable tipo string que recibe como parámetro el valor de la contraséña del usuario
		* $bd es una variable tipo string que recibe como parámetro el valor de la base de datos a la que se desea accesar.
	**/
	public function __construct(
		private string $host,
		private string $user,
		private string $passw,
		private string $bd) { }

	/**
		* La funcion Conectar crea una instancia de la clase mysqli para realizar una conexión a la base de datos
		* Recibe los parámetros cuando se instancia la clase Conection
	**/
	public function Conectar()
	 {
      try
			{
      	$pdo = new PDO('mysql:host='.$this->host.';dbname:'.$this->bd.'', ''.$this->user.'', ''.$this->passw.'');
        echo "Conexión exitosa";
				return $pdo;
      }
			catch (PDOException $e)
			{
      	echo 'Falló la conexión: ' . $e->getMessage();
      }
    }

	/**
		* Métodos getter de las propiedades privadas
	**/
	public function getHost()
	{
		return $this->host;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function getPassw()
	{
		return $this->passw;
	}

	public function getBd()
	{
		return $this->bd;
	}

	/**
		* Métodos setter de las propiedades privadas
	**/
	public function setHost($host)
	{
		$this->host = $host;
	}

	public function setUser($user)
	{
		$this->user = $user;
	}

	public function setPassw($passw)
	{
		$this->passw = $passw;
	}

	public function setBd($bd)
	{
		$this->bd = $bd;
	}
}

/*require "Class/ConectionPdo.php";

use Class\ConectionPdo;

$conexion = new ConectionPdo(host:"127.0.0.1", user:"administrador", passw:"jean9010jcBD", bd:"condominio");

$conexion->Conectar();*/



?>
