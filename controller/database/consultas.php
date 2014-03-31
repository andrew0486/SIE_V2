<?php
class Consulta{
    public $consulta;
    //public function __construct() {
    //    $this->setConsulta();
    //}
    public function setConsulta($query) {
        require_once '../../model/database/conexion.php';
        $conexion = new Conexion();
        $this->conn = $conexion;
        mysql_select_db($conexion->db, $conexion->getConexion()) or die("Problemas al conectar a la DB");
        $this->consulta = mysql_query("$query;") 
        or die("problemas en consula".  mysql_error()); 
    }
    
    public function getConsulta() {
        return $this->consulta;
    }
}
?>
