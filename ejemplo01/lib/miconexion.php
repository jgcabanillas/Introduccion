<?php
class miconexion {
	protected $servidor = '127.0.0.1';
	protected $puerto = '3306';
	protected $base = 'udo';
	protected $usuario = 'root';
	protected $passwd = 'toor';
	protected $conexion = '';

	public function __construct()
	{
		$this->conectar();
	}

	public function conectar()
	{
		$this->conexion = mysqli_connect($this->servidor,$this->usuario,$this->passwd,$this->base,$this->puerto);
		if (mysqli_connect_error()) {
			die('Error al conectar a la base de datos '.mysqli_connect_errno());
		} else {
			return $this->conexion;
		}
	}

	public function desconectar()
	{
		mysqli_close($this->conexion);
	}
}
?>